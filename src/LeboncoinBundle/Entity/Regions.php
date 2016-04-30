<?php
/**
 * Created by PhpStorm.
 * User: fr120940
 * Date: 29/04/2016
 * Time: 14:07
 */

namespace LeboncoinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Leboncoin
 *
 * @ORM\Table(name="regions")
 * @ORM\Entity(repositoryClass="LeboncoinBundle\Repository\LeboncoinRepository")
 */

class Regions {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="text")
     */
    private $libelle;

    /**
     * @var int
     *
     * @ORM\Column(name="codeInsee", type="integer")
     */

    private $codeInsee;


    /**
     * Get id
     *
     * @return integer
     */


    public function getId()
    {
        return $this->id;
    }


    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Leboncoin
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }


    /**
     * Set codeInsee
     *
     * @param int $codeInsee
     *
     * @return Leboncoin
     */
    public function setCodeInsee($codeInsee)
    {
        $this->codeInsee= $codeInsee;
        return $this;
    }



    /**
     * Get codeInsee
     *
     * @return integer
     */


    public function getCodeInsee()
    {
        return $this->codeInsee;
    }

}