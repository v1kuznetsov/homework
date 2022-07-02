<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Product;
use App\Entity\ProductInBasket;

use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use App\Repository\ProductInBasketRepository;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;



class ListController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function productList(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();
        return $this->render('list/main.html.twig', ['products' => $products]);
    }

    #[Route('/category', name: 'category')]
    public function menuList(): Response
    {
        return $this->render('list/categories.html.twig');
    }

    #[Route('/pc', name: 'pc')]
    public function pcList(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findBy(['category' => 1]);
        return $this->render('list/main.html.twig', ['products' => $products]);
    }

    #[Route('/laptops', name: 'laptop')]
    public function laptopList(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findBy(['category' => 2]);
        return $this->render('list/main.html.twig', ['products' => $products]);
    }

    #[Route('/tablets', name: 'tablet')]
    public function tabletList(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findBy(['category' => 3]);
        return $this->render('list/main.html.twig', ['products' => $products]);
    }

    #[Route('/phones', name: 'phone')]
    public function phoneList(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findBy(['category' => 4]);
        return $this->render('list/main.html.twig', ['products' => $products]);
    }
#
    #[Route('/product/{product}', name: 'productInfo')]
    public function productInfo($product, ProductRepository $productRepository): Response
    {
        $product = $productRepository->find($product);

        return $this->render('list/product.html.twig', ['product' => $product]);
    }
#
    #[Route('/profile', name: 'profile')]
    public function profile(UserRepository $users): Response
    {
        $user = $users->findOneBy(['email' => $this->getUser()->getEmail()]);
        return $this->render('list/profile.html.twig', ['user' => $user]);
    }



    #[Route('/basket/add/{id}', name: 'basketAdd')]
    public function basketAdd($id, EntityManagerInterface $em, ProductRepository $productRepository, ProductInBasketRepository $productInBasketRepository): Response
    {
        $product = $productRepository->find($id);
        $price = $product->getPrice();
        $total_price = $price;

        if($productInBasketRepository->find($product)){
            return $this->redirectToRoute('basket'); 
        }

        $addProduct = (new ProductInBasket())
            ->setCount(1)
            ->setProduct($product)
            ->setPrice($price)
            ->setTotalPrice($total_price);

        $em->persist($addProduct);
        $em->flush();
        return $this->redirectToRoute('basket');
    }

    #[Route('/basket', name: 'basket')]
    public function basket(ProductInBasketRepository $productInBasketRepository): Response
    {
        $products = $productInBasketRepository->findAll();
        
        return $this->render('list/basket.html.twig', ['products' => $products]);
    }

    #[Route('/basket/rm/{id}', name: 'basketRm')]
    public function basketRm($id, ManagerRegistry $registry, ProductInBasketRepository $productInBasketRepository): Response
    {
        $product = $productInBasketRepository->find($id);

        $entityManger = $registry->getManager();
        $entityManger->remove($product);
        $entityManger->flush();

        return $this->redirectToRoute('basket');
    }

    #[Route('/basket/change', name: 'basketChange')]
    public function basketChange(Request $request, ProductInBasketRepository $productInBasketRepository, EntityManagerInterface $em): Response
    {
        $id = $request->query->get('id');
        $count = $request->query->get('count');

        $product = $productInBasketRepository->find($id);
        $price = $product->getPrice();
        $product->setCount($count);
        $product->setTotalPrice($price * $count);
        $em->flush();
        return $this->redirectToRoute('basket');
    }
}
