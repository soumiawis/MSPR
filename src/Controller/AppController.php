<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/app", name="app")
     */
    public function index()
    {
        $list= ["morad","soumia", "safia"];
        $props = ["moyen"=> 3, "users" => $list, "date" => new \DateTime()];
        return $this->render('app/index.html.twig', $props);
    }
}
