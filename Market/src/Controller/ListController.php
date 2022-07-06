<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Product;
use App\Entity\ProductInBasket;
use App\Entity\ProductOrder;

use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use App\Repository\ProductInBasketRepository;
use App\Repository\ProductOrderRepository;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\RequestStack;



class ListController extends AbstractController
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

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
    public function basketAdd($id, EntityManagerInterface $em, ProductRepository $productRepository, ProductInBasketRepository $productInBasketRepository, ProductOrderRepository $orderRepository): Response
    {
        $session = $this->requestStack->getSession();
        $orderArr = $session->all();
        $i = reset($orderArr);
        // dd($i);
        if(is_array($i))
        {
            $order = $orderRepository->find($i);
        }
        else 
        {
            $order = (new ProductOrder);
        }
        // $order = $orderRepository->remove($order);
        // $em->flush();
        // $session->clear();
        // dd($order);
        
        

        $product = $productRepository->find($id);
        $price = $product->getPrice();
        $total_price = $price;

        // if($productInBasketRepository->find($product)){
        //     return $this->redirectToRoute('basket'); 
        // }

        $addProduct = (new ProductInBasket())
            ->setCount(1)
            ->setProduct($product)
            ->setPrice($price)
            ->setTotalPrice($price)
            ->addProductOrder($order);

        if(isset($order)){
            $total_price = $order->getTotalPrice();
        }

        

        $order
        ->setTotalPrice($total_price += $price)
        ->addProduct($addProduct)
        ->setStatus(1);
        
        $em->persist($addProduct);
        $em->persist($order);
        
        $em->flush();

            $orderId = $order->getId();
            $session->clear();
            $session->set($orderId, $order);

        return $this->redirectToRoute('basket');
    }

    #[Route('/basket', name: 'basket')]
    public function basket(ProductInBasketRepository $productInBasketRepository, ProductOrderRepository $orderRepository): Response
    {
        $session = $this->requestStack->getSession();
        $orderArr = $session->all();
        $i = reset($orderArr);
        // dd(gettype($i));
        if (is_object($i))
        {
            $products = $i->getProduct()->getValues();
            foreach($products as $val)
            {
                $productsId[] = $val->getId();
            }
            $products = $productInBasketRepository->findBy(['id' => $productsId]);
            
            return $this->render('list/basket.html.twig', ['products' => $products]);
        }
        return $this->render('list/basket.html.twig', ['products' => []]);
    }

    #[Route('/basket/rm/{id}', name: 'basketRm')]
    public function basketRm($id, ManagerRegistry $registry, ProductInBasketRepository $productInBasketRepository, ProductOrderRepository $orderRepository, EntityManagerInterface $em): Response
    {   
        $session = $this->requestStack->getSession();
        $orderArr = $session->all();
        $i = reset($orderArr);
        $order = $orderRepository->find($i);

        $product = $productInBasketRepository->find($id);
        $count = $product->getCount();
        $price = $product->getTotalPrice();
        $procuct_total_price = $price * $count;
        $order_price = $order->getTotalPrice();

        $order_price = $order_price - $procuct_total_price;
        
        $order->setTotalPrice($order_price);
        $em->persist($order);

        $entityManger = $registry->getManager();
        $entityManger->remove($product);
        $em->flush();

        return $this->redirectToRoute('basket');
    }

    #[Route('/basket/change', name: 'basketChange')]
    public function basketChange(Request $request, ProductInBasketRepository $productInBasketRepository, EntityManagerInterface $em, ProductOrderRepository $orderRepository): Response
    {
        $session = $this->requestStack->getSession();
        $orderArr = $session->all();
        $i = reset($orderArr);
        $order = $orderRepository->find($i);
        $order_price = $order->getTotalPrice();


        $id = $request->query->get('id');
        $count = $request->query->get('count');

        $product = $productInBasketRepository->find($id);
        $price = $product->getPrice();
        $product_total_price = $product->getTotalPrice();

        $order_price = $order_price - $product_total_price;

        $order->setTotalPrice($order_price);


        $product->setCount($count);
        $product->setTotalPrice($price * $count);

        $order_price = $order_price + ($price * $count);

        $order->setTotalPrice($order_price);
        
        $em->persist($order);

        $em->flush();
        return $this->redirectToRoute('basket');
    }

    #[Route('/orderForm', name: 'orderForm')]
    public function orderForm(Request $request, ProductInBasketRepository $productInBasketRepository, EntityManagerInterface $em, ProductOrderRepository $orderRepository)
    {
        return $this->render('list/order.html.twig');
    }

    #[Route('/order', name: 'order')]
    public function order(Request $request, ProductInBasketRepository $productInBasketRepository, EntityManagerInterface $em, ProductOrderRepository $orderRepository)
    {
        $session = $this->requestStack->getSession();
        $orderArr = $session->all();
        $i = reset($orderArr);
        if(!is_array($i))
        {
            return $this->redirectToRoute('list');
        }
        $order = $orderRepository->find($i);

        $status = $request->query->get('status');
        $city = $request->query->get('city');
        $adress = $request->query->get('adress');

        $order
            ->setStatus($status)
            ->setCity($city)
            ->setAdress($adress);

        $em->persist($order);
        $em->flush();

        if($order->getStatus() == 2)
        {
            $session->clear(); 
        }
        return $this->redirectToRoute('list');
    }
}
