<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of HomeController
 *
 * @author Monica Tevy Sen
 */
class HomeController extends AbstractController{
    /**
     * 
     * @var VisiteRepository
     */
    private $repository;
    /**
     * 
     * @param VisiteRepository $repository
     */
    function __construct(VisiteRepository $repository) {
        $this->repository = $repository;
    }
    /**
    * @Route("/", name="accueil")
    * @return Response
    */
    public function index(): Response {
        $visites = $this->repository->findAllLatest(6);
        return $this->render("pages/accueil.html.twig", [
            'visites' => $visites
        ]);
    }
}
