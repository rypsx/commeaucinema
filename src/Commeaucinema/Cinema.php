<?php

namespace Rypsx\Commeaucinema;

class Cinema {

    /**
     * @var array
     */
    public $erreur = [];

    /**
     * @var int
     */
    // public  $id;

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

    /**
     * @var string
     */
    public $ba;

    CONST TITRE_INVALIDE = "Le titre est invalide";
    CONST LIEN_INVALIDE  = "Le lien est invalide";
    CONST CAT_INVALIDE	 = "La catégorie est invalide";
    CONST DESC_INVALIDE  = "La description est invalide";
    CONST IMAGE_INVALIDE = "L'image est invalide";
    CONST BA_INVALIDE    = "La bande annonce est invalide";

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
     * Permettre la transformation des caractères spéciaux et des simples quotes en espace
     * @param  string $string
     * @return string
     */
    private function cleanString($string) {
        $string = strip_tags($string);
        $string = preg_replace("/\'/","",$string);
        $string = strtolower(preg_replace('~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')));
        return trim($string);
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
     * Assigner l'ID
     * @param string $lien
     */
    /*
    public function setId($lien)
    {
        if (empty($lien)) {
            $this->erreur[] = self::LIEN_INVALIDE;
        } else {
            $this->id = (int) $lien;
        }
    }
    */

    /**
     * Assigner le titre
     * @param string $titre
     */
    public function setTitre($titre)
    {
        if (empty($titre)) {
        	$this->erreur[] = self::TITRE_INVALIDE;
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
        	$this->erreur[] = self::LIEN_INVALIDE;
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
        	$this->erreur[] = self::CAT_INVALIDE;
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
        	$this->erreur[] = self::DESC_INVALIDE;
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
        	$this->erreur[] = self::IMAGE_INVALIDE;
        } else {
            $this->image = (string) $image;
        }
    }

    /**
     * Assigner la bande annonce
     * @param string $titre
     */
    public function setBa($titre)
    {
        $ba = str_replace(' ', '', strtolower((string) $titre));
        $ba = $this->cleanString($ba);
        $ba = 'http://videos.commeaucinema.com/m4v/'.$ba.'_fa.m4v';
        $this->ba = (string) $ba;

        // Remove the part below, because execution takes 6 seconds
        /*$headers = @get_headers($ba);
        if (strpos($headers[0], '200') === false) {
            $this->erreur[] = self::BA_INVALIDE;
        } else {
            $this->ba = (string) $ba;
        }*/
    }
}
