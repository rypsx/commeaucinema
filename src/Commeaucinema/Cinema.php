<?php

namespace Rypsx\Commeaucinema;

use Rypsx\Fonctions;

class Cinema {

    /**
     * @var array
     */
    public $erreur = [];

    /**
     * @var string
     */
    public $titre;

    /**
     * @var string
     */
    public $lien;

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
    CONST DESC_INVALIDE  = "La description est invalide";
    CONST IMAGE_INVALIDE = "L'image est invalide";
    CONST BA_INVALIDE    = "La bande annonce est invalide";

    /**
     * Construction de l'objet
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
     * @param string $param
     * Pour choisir la 1e méthode (0.5s-3.5s, ALEATOIRE)    -> indiquer le titre en paramètre
     * Pour choisir la 2e méthode (3.5s, FIABLE et PRECISE) -> indiquer le lien en paramètre
     */
    public function setBa($param)
    {
        /**
         * Exec time : 500ms
         */
        /*
        $ba = str_replace(' ', '', strtolower((string) $param));
        $ba = Fonctions::cleanString($ba);
        if (empty($ba)) {
            $this->erreur[] = self::BA_INVALIDE;
            $this->ba = null;
        } else {
            $ba = 'http://videos.commeaucinema.com/m4v/'.$ba.'_fa.m4v';
            $this->ba = (string) $ba;
        }
        */

        /**
         * Exec time : 0.5s + 3.5s
         * Remove the part below, because of duration of execution
         */
        /*
        $headers = @get_headers($ba);
        if (strpos($headers[0], '200') === false) {
            $this->erreur[] = self::BA_INVALIDE;
        } else {
            $this->ba = (string) $ba;
        }
        */

        /**
         * Exec time : Variable : 3.5s-6.5s
         * Meilleur méthode
         */        
        $ba = str_replace('film', 'bandes-annonces', strtolower((string) $param));
        $curl = Fonctions::curl($ba);
        $html = '#<source src=(.*?) type="video/mp4"#';
        preg_match($html, $curl, $recup);
        $this->ba = (string) isset($recup[1]) ? $recup[1] : null;
        
    }
}
