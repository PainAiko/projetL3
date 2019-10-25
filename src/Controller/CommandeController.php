<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StockController extends AbstractController
{
    /**
     * @Route("/stock", name="stock")
     */
    public function index()
    {
        return $this->render('stock/index.html.twig', [
            'controller_name' => 'StockController',
        ]);
    }
    public function add()
    {
        return new Response('<h1>Ajouter un commande</h1>');
    }
    public function show($url)
    {
        return new Response('<h1>Lire le commande</h1>');
    }

    public function edit($id)
    {
        return new Response('<h1>Modifier le commande</h1>');
    }
    public function remove($id)
    {
        return new Response('<h1>Supprimet le commande</h1>');
    }

}


