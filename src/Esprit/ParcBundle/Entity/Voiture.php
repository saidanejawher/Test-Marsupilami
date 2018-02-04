<?php
/**
 * Created by PhpStorm.
 * User: Laser
 * Date: 17/02/2017
 * Time: 10:20
 */

namespace Esprit\ParcBundle\Entity;
use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Entity
 */
class Voiture
{
    /**
     * @ORM\GeneratedValue
     * @ORM\Id
     * @ORM\Column(type="integer")
     */

    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $serie;

    /**
     * @ORM\Column(type="date")
     */
    private $date;


    /**
     * @ORM\Column(type="string",length=255)
     */
    private $marque;

    /**
     * @ORM\ManyToOne(targetEntity="Modele")
     * @ORM\JoinColumn(name="modele_id", referencedColumnName="id")
     */
    private $modele;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
     * @param mixed $serie
     */
    public function setSerie($serie)
    {
        $this->serie = $serie;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getMarque()
    {
        return $this->marque;
    }

    /**
     * @param mixed $marque
     */
    public function setMarque($marque)
    {
        $this->marque = $marque;
    }

    /**
     * @return mixed
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @param mixed $modele
     */
    public function setModele($modele)
    {
        $this->modele = $modele;
    }







}