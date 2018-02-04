<?php

namespace Esprit\ParcBundle\Controller;

use Esprit\ParcBundle\Entity\Modele;
use Esprit\ParcBundle\Form\ModeleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class ModeleController extends Controller
{
    public function listAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("EspritParcBundle:Modele")->findAll();


        return $this->render('EspritParcBundle:Modele:list.html.twig',array('modeles'=>$modele));
    }
    public function supprimerAction($id)
    {

        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("EspritParcBundle:Modele")->find($id);
        $em->remove($modele);
        $em->flush();



        return $this->redirectToRoute("AfficheModele");
    }

    public function ajoutAction(Request $request)
    {
       $modele=new Modele();
       if($request->isMethod('POST')){
           $modele->setLibelle($request->get('libelle'));
           $modele->setPays($request->get('pays'));
           $em=$this->getDoctrine()->getManager();
           $em->persist($modele);
           $em->flush();
           return $this->redirectToRoute("AfficheModele");
       }
        return $this->render('EspritParcBundle:Modele:ajouter.html.twig',array());
    }

    public function ajout2Action(Request $request)
    {
        $modele=new Modele();
        $Form = $this->createForm(ModeleType::class, $modele);
        $Form->handleRequest($request);
        if($Form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute("AfficheModele");
        }
        return $this->render('EspritParcBundle:Modele:ajouter2.html.twig',array(
            'form' =>$Form->createView()
        ));
    }

    public function modifierAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("EspritParcBundle:Modele")->find($id);
        $Form = $this->createForm(ModeleType::class, $modele);
        $Form->handleRequest($request);


        if($Form->isValid()){

            $em=$this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();
            return $this->redirectToRoute("AfficheModele");
        }
        return $this->render('EspritParcBundle:Modele:modifier.html.twig',array(
            'form' =>$Form->createView()
        ));
    }

    public function rechercheAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();

        if($request->isMethod('POST')&&(($request->get('libelle'))!=null)){

            $modeles=$em->getRepository("EspritParcBundle:Modele")->findBy(array('libelle'=>$request->get('libelle')));
            return $this->render('EspritParcBundle:Modele:recherche.html.twig',array('modeles'=>$modeles));
        }

        $modeles=$em->getRepository("EspritParcBundle:Modele")->findAll();
        return $this->render('EspritParcBundle:Modele:recherche.html.twig',array('modeles'=>$modeles));



    }
    public function QueryBuilderAction()
    {
        $rep=$this->getDoctrine()->getManager()->getRepository('EspritParcBundle:Modele');

        $modele = $rep->findPaysQB();

        return $this->render("EspritParcBundle:Modele:afficheQB.html.twig",array('modele'=>$modele));
    }
    public function findDQLAction()
    {
        $rep=$this->getDoctrine()->getManager()->getRepository('EspritParcBundle:Modele');

        $modele = $rep->findPaysDQL();

        return $this->render("EspritParcBundle:Modele:afficheQB.html.twig",array('modele'=>$modele));
    }

    public function findDQL2Action($pays)
    {
        $rep=$this->getDoctrine()->getManager()->getRepository('EspritParcBundle:Modele');

        $modele = $rep->findPaysDQL($pays);

        return $this->render("EspritParcBundle:Modele:afficheQB.html.twig",array('modele'=>$modele));
    }



}