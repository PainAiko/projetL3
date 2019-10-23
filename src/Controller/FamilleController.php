<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FamilleController extends AbstractController
{
    /**
     * @Route("/famille", name="famille")
     */
    public function index()
    {
        return $this->render('famille/index.html.twig', [
            'controller_name' => 'FamilleController',
        ]);
    }
}
