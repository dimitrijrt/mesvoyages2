<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * Description of AcceuilController
 *
 * @author DIM
 */
class AcceuilController extends AbstractController {
    
    /**
     * 
     * @Route("/accueil", name="accueil")
     * @return Response
     */
    public function index() : Response{
        return new Response($this->render("pages/accueil.html.twig"));
    }
    
    
}
