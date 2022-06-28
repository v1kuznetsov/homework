<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Product;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;

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
}
