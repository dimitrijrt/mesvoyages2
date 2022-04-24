<?php

namespace  App\Controller\admin;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdminVoyagesController
 *
 * @author DIM
 */
class AdminVoyagesController extends AbstractController {
    
    
    /**
     * @Route ("/admin", name="admin.voyages")
     * @return Response
     */
    public function index() : Response{
        $visites = $this->repository->findAllOrderBy('datecreation','DESC');
        return $this->render("admin/admin.voyages.html.twig", ['visites' => $visites
        ]);
    }
    
     /**
     * 
     * @var VisiteRepository
     */
    private $repository;
    
     /**
     * @param VisiteRepository $repository
     */
   
    /**
     *
     * @var EntityManagerInterface
     */
    private $om;
    /**
     * @param VisiteRepository $repository
     * @param EntityManagerInterface $om
     */
    function __construct(VisiteRepository $repository, EntityManagetInterface $om) {
        $this->repository= $repository;
        $this->om = $om;
    }
    
    /**
     * @Route ("/admin/suppr/{id]", name="admin.voyage.suppr")
     * @param \App\Controller\admin\Visite $visite
     * @return Response
     */
    public function suppr(Visite $visite): Response {
        $this->om->remove($visite);
        $this->om->flush();
        return $this->redirectToRoute('admin.voyages');
        
    }
}
