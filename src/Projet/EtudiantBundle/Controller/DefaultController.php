<?php

namespace Projet\EtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ProjetEtudiantBundle:Default:index.html.twig');
    }
}
