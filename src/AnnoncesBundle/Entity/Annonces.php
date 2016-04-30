<?php
/**
 * Created by PhpStorm.
 * User: fr120940
 * Date: 29/04/2016
 * Time: 14:07
 */

namespace AnnoncesBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Leboncoin
 *
 * @ORM\Table(name="annonces")
 * @ORM\Entity(repositoryClass="AnnoncesBundle\Repository\AnnoncesRepository")
 */

class Annonces {

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
     * @ORM\Column(name="titre", type="text")
     */
    private $titre;


    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */

    private $description;


    /**
     * @var int
     *
     * @ORM\Column(name="prix", type="integer")
     */

    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="text")
     */

    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="text")
     */

    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="text")
     */

    private $type;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Annonces
     */
    public function setTitre($titre)
    {
        $this->titre= $titre;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Annonces
     */
    public function setDescription($description)
    {
        $this->description= $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * Set prix
     *
     * @param int $prix
     *
     * @return Annonces
     */
    public function setPrix($prix)
    {
        $this->prix= $prix;
        return $this;
    }



    /**
     * Get prix
     *
     * @return integer
     */


    public function getPrix()
    {
        return $this->prix;
    }


    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Annonces
     */
    public function setCategorie($categorie)
    {
        $this->categorie= $categorie;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }


    /**
     * Set status
     *
     * @param string $status
     *
     * @return Annonces
     */
    public function setStatus($status)
    {
        $this->status= $status;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Annonces
     */
    public function setType($type)
    {
        $this->type= $type;
        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }





}