<?php

namespace Esprit\ParcBundle\Repository;

use Doctrine\ORM\EntityRepository;
/**
 * Created by PhpStorm.
 * User: Laser
 * Date: 07/03/2017
 * Time: 14:30
 */
class ModeleRepository extends EntityRepository
{

    public function findPaysQB(){
        $query=$this->createQueryBuilder('s');
        $query->where('s.pays=:pays')->setParameter('pays','Allemagne');
        return $query->getQuery()->getResult();

        //$modele=$query->getResult();
    }

    public function findPaysDQL($pays)
    {
        $query=$this->getEntityManager()->createQuery("Select m from EspritParcBundle:Modele m WHERE m.pays=:pays")->setParameter('pays',$pays);
        return $query->getResult();

    }

}