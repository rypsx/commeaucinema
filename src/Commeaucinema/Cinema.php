<?php

namespace Rypsx\Commeaucinema;

class Cinema {

    /**
     * @var string
     */
    public  $titre;

    /**
     * @var string
     */
    public $lien;

    /**
     * @var string
     */
    public $categorie;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $image;

    CONST TITRE_INVALIDE = "Le titre est invalide";
    CONST LIEN_INVALIDE  = "Le lien est invalide";
    CONST CAT_INVALIDE	 = "La catégorie est invalide";
    CONST DESC_INVALIDE  = "La description est invalide";
    CONST IMAGE_INVALIDE = "L'image est invalide";

    /**
     * Construction de l'objet Status
     * @param array $valeurs
     */
    public function __construct($valeurs = [])
    {
        if (!empty($valeurs)) {
            $this->rechercheMethode($valeurs);
        }
    }

    /**
     * Méthode permettant d'assigner les valeurs spécifiées en paramètre aux attributs correspondants
     * @param  array $donnees
     * @return void
     */
    public function rechercheMethode($donnees)
    {
        foreach ($donnees as $attribut => $valeur) {
            $methode = 'set'.ucfirst($attribut);
            if (is_callable([$this, $methode])) {
                $this->$methode($valeur);
            }
        }
    }

    /**
     * Assigner le titre
     * @param string $titre
     */
    public function setTitre($titre)
    {
        if (empty($titre)) {
        	throw new Exception(self::TITRE_INVALIDE);
        } else {
            $this->titre = (string) $titre;
        }
    }

    /**
     * Assigner le lien
     * @param string $lien
     */
    public function setLien($lien)
    {
        if (empty($lien)) {
        	throw new Exception(self::LIEN_INVALIDE);
        } else {
            $this->lien = (string) $lien;
        }
    }

    /**
     * Assigner la categorie
     * @param string $categorie
     */
    public function setCategorie($categorie)
    {
        if (empty($categorie)) {
        	throw new Exception(self::CAT_INVALIDE);
        } else {
            $this->categorie = (string) $categorie;
        }
    }

    /**
     * Assigner la description
     * @param string $description
     */
    public function setDescription($description)
    {
        if (empty($description)) {
        	throw new Exception(self::DESC_INVALIDE);
        } else {
            $this->description = (string) explode(" | ", strip_tags($description))[0];
        }
    }

    /**
     * Assigner l'image
     * @param string $image
     */
    public function setImage($image)
    {
        if (empty($image)) {
        	throw new Exception(self::IMAGE_INVALIDE);
        } else {
            $this->image = (string) $image;
        }
    }
}
