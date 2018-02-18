<?php

namespace Rypsx;

class Fonctions
{
	/**
	 * Instancie un méthode permettant de rechercher un contenu sur une page web externe
	 * @param  string $url
	 * @return string
	 */
	public static function curl($url)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_ENCODING, "gzip");
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		$donnee = curl_exec($curl);
		curl_close($curl);
		return $donnee;
	}

    /**
     * Permettre la transformation des caractères spéciaux et des simples quotes en espace
     * @param  string $string
     * @return string
     */
    public static function cleanString($string) {
        $string = strip_tags($string);
        $string = preg_replace("/\'/","",$string);
        $string = strtolower(preg_replace('~&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')));
        return trim($string);
    }
}
