<?php
/**
 * Created by PhpStorm.
 * User: Laser
 * Date: 17/02/2017
 * Time: 10:20
 */

namespace Esprit\ParcBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;



/**
 * @ORM\Entity
 */
class Animal
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

    private $age;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $famille;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $race;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $nourriture;






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
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * @param mixed $famille
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;
    }

    /**
     * @return mixed
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * @param mixed $race
     */
    public function setRace($race)
    {
        $this->race = $race;
    }

    /**
     * @return mixed
     */
    public function getNourriture()
    {
        return $this->nourriture;
    }

    /**
     * @param mixed $nourriture
     */
    public function setNourriture($nourriture)
    {
        $this->nourriture = $nourriture;
    }

    /**
     * @ORM\ManyToMany(targetEntity="Animal", mappedBy="mesAmis")
     */
    private $amisAvecMoi;
    /**
     * @ORM\ManyToMany(targetEntity="Animal", inversedBy="amisAvecMoi")
     * @ORM\JoinTable(name="amis",
     *      joinColumns={@ORM\JoinColumn(name="animal_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="ami_id", referencedColumnName="id")}
     *      )
     */
    private $mesAmis;

    /**
     * @return mixed
     */
    public function getAmisAvecMoi()
    {
        return $this->amisAvecMoi;
    }

    /**
     * @param mixed $amisAvecMoi
     */
    public function setAmisAvecMoi($amisAvecMoi)
    {
        $this->amisAvecMoi = $amisAvecMoi;
    }

    /**
     * @return mixed
     */
    public function getMesAmis()
    {
        return $this->mesAmis;
    }

    /**
     * @param mixed $mesAmis
     */
    public function setMesAmis($mesAmis)
    {
        $this->mesAmis = $mesAmis;
    }



}