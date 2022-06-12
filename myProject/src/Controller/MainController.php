<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;

use App\Entity\Product;
use App\Form\StoreType;
use App\Repository\ProductRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/main', name: 'product_list', methods: ['GET', 'POST'])]
    public function productList(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->render('Store.html.twig', ['products' => $products]);
    }

    #[Route('/main_add', name: 'product_add', methods: ['GET', 'POST'])]
    public function addProduct(Request $request, ManagerRegistry $registry): Response
    {
        $product = new Product();
        $form = $this->createForm(StoreType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();

            $entityManger = $registry->getManager();
            $entityManger->persist($product);
            $entityManger->flush();

            return $this->redirectToRoute('product_list');
        }

        return $this->renderForm('StoreAdd.html.twig', ['form' => $form]);
    }

    #[Route('/main_rm/{product}', name: 'product_rm')]
    public function removeProduct($product, ManagerRegistry $registry, ProductRepository $productRepository): Response
    {
        if (!$product) {
            throw $this->Exception('Product not found');
        }
        $product = $productRepository->find($product);

        $entityManger = $registry->getManager();
        $entityManger->remove($product);
        $entityManger->flush();

        return $this->redirectToRoute('product_list');
    }

    #[Route('/main_edit/{product}', name: 'product_edit', methods: ['GET', 'POST'])]
    public function editProduct($product, Request $request, ManagerRegistry $registry, ProductRepository $productRepository): Response
    {
        if (!$product) {
            throw $this->Exception('Product not found');
        }
        $product = $productRepository->find($product);
        $form = $this->createForm(StoreType::class, $product, ['action' => $this->generateUrl('product_edit', ['product' => $product->getId()])]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();

            $entityManger = $registry->getManager();
            $entityManger->flush();

            return $this->redirectToRoute('product_list');
        }

        return $this->renderForm('StoreAdd.html.twig', ['form' => $form]);
    }
}
