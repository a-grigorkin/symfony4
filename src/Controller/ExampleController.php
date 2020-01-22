<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
// use Symfony\Component\HttpFoundation\Response;

/**
 * @author Andrew Grigorkin
 */
class ExampleController extends AbstractController
{
    /**
     * @Route("example", name="example")
     */
    public function index()
    {
        // return new Response("Some HTML goes here...");

        $title = 'A Good Page';

        // $products = $this->getDoctrine()->getRepository(\App\Entity\Product::class)->findAll();

        return $this->render('example.html.twig', ['title' => $title]);
    }

    /**
     * @Route("example/save/{title}", name="example_save", methods={"GET"}, requirements={"title"="\w+"})
     */
    public function save($title)
    {
        // doctrine:database:create
        // make:entity
        // doctrine:migrations:diff
        // doctrine:migrations:migrate

        $entityManager = $this->getDoctrine()->getManager();

        $product = new \App\Entity\Product();
        $product->setTitle($title);
        
        $entityManager->persist($product);
        
        $entityManager->flush();

        return $this->redirectToRoute('example');
    }
}