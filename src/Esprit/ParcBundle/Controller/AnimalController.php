<?php

namespace Esprit\ParcBundle\Controller;

use Esprit\ParcBundle\Entity\Animal;

use Esprit\ParcBundle\Form\AnimalType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AnimalController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function listAction()
    {
        $em=$this->getDoctrine()->getManager();
        $animales=$em->getRepository("EspritParcBundle:Animal")->findAll();


        return $this->render('EspritParcBundle:Animal:Affichege.html.twig',array('animales'=>$animales));
    }


    public function supprimerAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $animal=$em->getRepository("EspritParcBundle:Animal")->find($id);
        $em->remove($animal);
        $em->flush();



        return $this->redirectToRoute("AfficheAnim");
    }

    public function ajoutAction(Request $request)
    {
        $animal=new Animal();
        if($request->isMethod('POST')){
            $animal->setAge($request->get('age'));
            $animal->setFamille($request->get('famille'));
            $animal->setRace($request->get('race'));
            $animal->setNourriture($request->get('nourriture'));
            $em=$this->getDoctrine()->getManager();
            $em->persist($animal);
            $em->flush();
            return $this->redirectToRoute("AfficheModele");
        }
        return $this->render('EspritParcBundle:Modele:ajouter.html.twig',array());
    }

    public function ajout2Action(Request $request)
    {
        $animal=new Animal();
        $Form = $this->createForm(AnimalType::class, $animal);
        $Form->handleRequest($request);
        if($Form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->persist($animal);
            $em->flush();
            return $this->redirectToRoute("AfficheAnim");
        }
        return $this->render('EspritParcBundle:Animal:AjouterAnimal.html.twig',array(
            'form' =>$Form->createView()
        ));
    }


    public function modifierAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $animal=$em->getRepository("EspritParcBundle:Animal")->find($id);
        $Form = $this->createForm(AnimalType::class, $animal);
        $Form->handleRequest($request);


        if($Form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->persist($animal);
            $em->flush();
            return $this->redirectToRoute("AfficheAnim");
        }
        return $this->render('EspritParcBundle:Animal:ModifierAnimal.html.twig',array(
            'form' =>$Form->createView()
        ));
    }


}
