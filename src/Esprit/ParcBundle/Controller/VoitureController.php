<?php

namespace Esprit\ParcBundle\Controller;

use Esprit\ParcBundle\Entity\Voiture;
use Esprit\ParcBundle\Form\VoitureType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class VoitureController extends Controller
{
    public function affichageAction($marque)
    {
        return $this->render('EspritParcBundle:Voiture:affichage.html.twig',array(
            'm'=>$marque
        ));
    }

    public function listAction()
    {
        $marques=array('bmw','ford','pagani','mclaren');

        $voitures=array(array('id'=>'c2345','serie'=>'176','dateMiseCirculation'=>'11/10','marque'=>'BMW'));

        return $this->render('EspritParcBundle:Voiture:list.html.twig',array(
            'marques'=>$marques,
            'voitures'=>$voitures
        ));
    }

    public function afficheAction(Request $request)
    {   $id=$request->get('id');
        $serie=$request->get('serie');
        $date=$request->get('date');
        $marque=$request->get('marque');


        return $this->render('EspritParcBundle:Voiture:affiche.html.twig',array(
            'id'=>$id,
            'serie'=>$serie,
            'date'=>$date,
            'marque'=>$marque
        ));
    }

    public function ajoutAction(Request $request)
    {
        $voiture=new Voiture();
        $Form = $this->createForm(VoitureType::class, $voiture);
        $Form->handleRequest($request);
        if($Form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->persist($voiture);
            $em->flush();
            return $this->redirectToRoute("AfficheModele");
        }
        return $this->render('EspritParcBundle:Modele:ajouter2.html.twig',array(
            'form' =>$Form->createView()
        ));
    }


}
