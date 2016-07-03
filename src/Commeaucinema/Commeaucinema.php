<?php

namespace Rypsx\Commeaucinema;

use Carbon\Carbon;

class Commeaucinema
{
    /**
     * @var string
     */
    public $erreur;

    /**
     * @var Carbon
     */
    public $date;

    /**
     * @var string
     */
    public $mainUrl = 'http://www.commeaucinema.com/rsspage.php?feed=';

    /**
     * @var Object
     */
    public $semaine;

    /**
     * @var Object
     */
    public $enSalles;

    /**
     * @var Object
     */
    public $aVenir;

    CONST URL_INVALIDE = "Impossible d'obtenir les informations. Veuillez réessayer plus tard.";

    /**
     * Instance de l'objet Commeaucinema
     * @return void
     */
    public function __construct()
    {
        $this->setdate();
        $this->obtenirSemaine();
        $this->obtenirEnSalle();
        $this->obtenirAVenir();
    }

    /**
     * Obtenir la date actuelle
     * @return Carbon Object
     */
    private function getDatetime()
    {
        $time = Carbon::now();
        return $time->toDateTimeString();
    }

    /**
     * Définit la date actuelle
     * @param  string $date
     */
    public function setDate()
    {
        $this->date = $this->getDatetime();
    }

    /**
     * Méthode permettant d'obtenir les sorties cinéma de la semaine
     * @return void
     */
    private function obtenirSemaine()
    {
        $xml = $this->mainUrl.'cine';
        $fiche = array();
        try {
            $xml = simplexml_load_file($xml);
            if (count($xml->channel->item) == 0) {
                $this->erreur = self::URL_INVALIDE;
            }
            foreach ($xml->channel->item as $numItem => $item) {
                $fiche[] = new Cinema(
                    [
                        'titre'       => $item->title,
                        'lien'        => $item->link,
                        'categorie'   => $item->category,
                        'description' => $item->description,
                        'image'       => $item->enclosure['url'],
                    ]
                );
            }
            $this->semaine = $fiche;
        } catch (Exception $e) {
            $this->erreur = $e->getMessage();
        }
    }

    /**
     * Méthode permettant d'obtenir les films toujours en salle
     * @return void
     */
    private function obtenirEnSalle()
    {
        $xml = $this->mainUrl.'cineensalle';
        $fiche = array();
        try {
            $xml = simplexml_load_file($xml);
            if (count($xml->channel->item) == 0) {
                $this->erreur = self::URL_INVALIDE;
            }
            foreach ($xml->channel->item as $numItem => $item) {
                $fiche[] = new Cinema(
                    [
                        'titre'       => $item->title,
                        'lien'        => $item->link,
                        'categorie'   => $item->category,
                        'description' => $item->description,
                        'image'       => $item->enclosure['url'],
                    ]
                );
            }
            $this->enSalles = $fiche;
        } catch (Exception $e) {
            $this->erreur = $e->getMessage();
        }
    }

    /**
     * Méthode permettant d'obtenir les films qui sortiront prochainement
     * @return void
     */
    private function obtenirAVenir()
    {
        $xml = $this->mainUrl.'cineavenir';
        $fiche = array();
        try {
            $xml = simplexml_load_file($xml);
            if (count($xml->channel->item) == 0) {
                $this->erreur = self::URL_INVALIDE;
            }
            foreach ($xml->channel->item as $numItem => $item) {
                $fiche[] = new Cinema(
                    [
                        'titre'       => $item->title,
                        'lien'        => $item->link,
                        'categorie'   => $item->category,
                        'description' => $item->description,
                        'image'       => $item->enclosure['url'],
                    ]
                );
            }
            $this->aVenir = $fiche;
        } catch (Exception $e) {
            $this->erreur = $e->getMessage();
        }
    }
}
