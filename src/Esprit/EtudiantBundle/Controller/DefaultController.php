<?php

namespace Esprit\EtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EspritEtudiantBundle:Default:index.html.twig');
    }
}
