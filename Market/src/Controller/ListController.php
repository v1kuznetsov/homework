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
        return $this->render('list/main.html.twig', ['products' => $products, 'category' => 1]);
    }

    #[Route('/laptops', name: 'laptop')]
    public function laptopList(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findBy(['category' => 2]);
        return $this->render('list/main.html.twig', ['products' => $products, 'category' => 2]);
    }

    #[Route('/tablets', name: 'tablet')]
    public function tabletList(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findBy(['category' => 3]);
        return $this->render('list/main.html.twig', ['products' => $products, 'category' => 3]);
    }

    #[Route('/phones', name: 'phone')]
    public function phoneList(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findBy(['category' => 4]);
        return $this->render('list/main.html.twig', ['products' => $products, 'category' => 4]);
    }

    #[Route('/product/{product}', name: 'productInfo')]
    public function productInfo($product, ProductRepository $productRepository): Response
    {
        $product = $productRepository->find($product);

        return $this->render('list/product.html.twig', ['product' => $product]);
    }

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
        $i = array_pop($orderArr);
        if (is_string($i)) {
            $order = (new ProductOrder());
        } else {
            $order = $orderRepository->find($i);
        }


        $product = $productRepository->find($id);
        if ($order->getId() !== null) {
            $products = $i->getProduct()->getValues();
            $productsId = [];
            foreach ($products as $val) {
                $productsId[] = $val->getProduct()->getId();
            }
            foreach ($productsId as $val) {
                if ($val === $product->getId()) {
                    return $this->redirectToRoute('basket');
                }
            }
        }
        $price = $product->getPrice();
        $total_price = $price;

        $addProduct = (new ProductInBasket())
            ->setCount(1)
            ->setProduct($product)
            ->setPrice($price)
            ->setTotalPrice($price)
            ->addProductOrder($order);

        if (isset($order)) {
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
        $session->set($orderId, $order);

        return $this->redirectToRoute('basket');
    }

    #[Route('/basket', name: 'basket')]
    public function basket(ProductInBasketRepository $productInBasketRepository, ProductOrderRepository $orderRepository): Response
    {
        $session = $this->requestStack->getSession();
        $orderArr = $session->all();
        $i = array_pop($orderArr);

        if (isset($i) && !is_string($i)) {
            $products = $i->getProduct()->getValues();
            foreach ($products as $val) {
                $productsId[] = $val->getId();
            }

            if (!isset($productsId)) {
                return $this->render('list/basket.html.twig', ['products' => $products]);
            }

            $products = $productInBasketRepository->findBy(['id' => $productsId]);

            return $this->render('list/basket.html.twig', ['products' => $products]);
        } else {
            return $this->render('list/basket.html.twig', ['products' => []]);
        }
    }

    #[Route('/basket/rm/{id}', name: 'basketRm')]
    public function basketRm($id, ManagerRegistry $registry, ProductInBasketRepository $productInBasketRepository, ProductOrderRepository $orderRepository, EntityManagerInterface $em): Response
    {
        $session = $this->requestStack->getSession();
        $orderArr = $session->all();
        $i = array_pop($orderArr);

        if (isset($i) && !is_string($i)) {
            $order = $orderRepository->find($i);
        }

        $product = $productInBasketRepository->find($id);
        $count = $product->getCount();
        $procuct_total_price = $product->getTotalPrice();
        $order_price = $order->getTotalPrice();

        $order_price = $order_price - $procuct_total_price;

        $order
        ->setTotalPrice($order_price)
        ->removeProduct($product);

        $em->remove($product);
        $em->persist($order);
        $em->flush();

        $orderId = $order->getId();
        $session->set($orderId, $order);

        return $this->redirectToRoute('basket');
    }

    #[Route('/basket/change', name: 'basketChange')]
    public function basketChange(Request $request, ProductInBasketRepository $productInBasketRepository, EntityManagerInterface $em, ProductOrderRepository $orderRepository): Response
    {
        $session = $this->requestStack->getSession();
        $orderArr = $session->all();

        $user = $this->getUser();
        $i = array_pop($orderArr);
        if (isset($i) && !is_string($i)) {
            $order = $orderRepository->find($i);
        }

        $order_price = $order->getTotalPrice();


        $id = $request->query->get('id');
        $count = $request->query->get('count');

        $product = $productInBasketRepository->find($id);
        $price = $product->getPrice();
        $product_total_price = $product->getTotalPrice();

        $order_price = $order_price - $product_total_price;

        $product->setCount($count);
        $product->setTotalPrice($price * $count);

        $order_price = $order_price + ($price * $count);

        $order
        ->setTotalPrice($order_price)
        ->removeProduct($product)
        ->addProduct($product);

        $em->persist($product);
        $em->persist($order);

        $em->flush();

        $orderId = $order->getId();
        $session->set($orderId, $order);

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

        $i = array_pop($orderArr);
        if (isset($i) && !is_string($i)) {
            $products = $i->getProduct()->getValues();
            $productsId = [];
            foreach ($products as $val) {
                $productsId[] = $val->getProduct()->getId();
            }

            if ($productsId == null) {
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

            if ($order->getStatus() == 2) {
                $session->remove($order->getId());
            }
            return $this->redirectToRoute('list');
        } else {
            return $this->redirectToRoute('list');
        }
    }

    #[Route('/search', name: 'search')]
    public function search(ProductRepository $productRepository, Request $request, EntityManagerInterface $em, ManagerRegistry $registry): Response
    {
        $search = $request->query->get('search');
        $em = $registry->getManager();

        $productsName = $em->createQuery("SELECT u FROM App\Entity\Product u WHERE u.name LIKE '%$search%'")->getResult();
        $productsDesc = $em->createQuery("SELECT u FROM App\Entity\Product u WHERE u.description LIKE '%$search%'")->getResult();
        $products = array_merge($productsName, $productsDesc);

        foreach ($products as $key1 => $val1) {
            foreach ($products as $key2 => $val2) {
                if ($key2 <= $key1) {
                    continue;
                }
                if ($val2 === $val1) {
                    unset($products[$key2]);
                }
            }
        }
        if ($category = $request->query->get('category')) {
            foreach ($products as $key => $val) {
                if ($val->getCategory()->getId() != $category) {
                    unset($products[$key]);
                }
            }
        }
        return $this->render('list/main.html.twig', ['products' => $products]);
    }
}
