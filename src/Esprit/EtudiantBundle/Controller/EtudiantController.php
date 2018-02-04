<?php

namespace Esprit\EtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class EtudiantController extends Controller
{
    public function afficheAction($id)
    {
        return new Response("bonne nuit etudiant n² ".$id.".");
    }

    public function voirAction($name)
    {
        return $this->render('EspritEtudiantBundle:Etudiant:etudiant.html.twig',array('nom'=>$name));
    }
}
