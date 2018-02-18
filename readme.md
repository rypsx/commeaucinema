commeaucinema.com PHP API
=======================

[![Latest Stable Version](https://poser.pugx.org/rypsx/commeaucinema/v/stable?format=flat-square)](https://packagist.org/packages/rypsx/commeaucinema) [![Total Downloads](https://poser.pugx.org/rypsx/commeaucinema/downloads?format=flat-square)](https://packagist.org/packages/rypsx/commeaucinema) [![License](https://poser.pugx.org/rypsx/commeaucinema/license?format=flat-square)](https://packagist.org/packages/rypsx/commeaucinema) [![Monthly Downloads](https://poser.pugx.org/rypsx/commeaucinema/d/monthly?format=flat-square)](https://packagist.org/packages/rypsx/commeaucinema)[![SensioLabsInsight](https://insight.sensiolabs.com/projects/219dc895-5a91-419d-97b1-5a8aebe5f498/mini.png)](https://insight.sensiolabs.com/projects/219dc895-5a91-419d-97b1-5a8aebe5f498)

### [Access to English version](#english)

Ce package vous permet d'extraire les principaux flux RSS de commeaucinema.com . Il a été produit par pur besoin, car les widgets en flash proposés sur le site sont pour moi dépassés.

## Présentation

Ce package vous permet d'obtenir :

1. Les sorties cinéma de la semaine
2. Les films actuellement en salle
3. La liste des films qui sortiront prochainement

Les objets que vous obtenez :

	object(Rypsx\Commeaucinema\Cinema)[4]
		public 'erreur' => array (size=0)
		public 'titre' => string (length=42)
		public 'lien' => string (length=81)
		public 'description' => string (length=47)
		public 'image' => string (length=55)
		public 'ba' => string (length=62)

## Utilisation

	use Rypsx\Commeaucinema\Commeaucinema;

	require __DIR__ . '/../vendor/autoload.php';

	try {
	    $cac = new Commeaucinema();
	} catch (Exception $e) {
	    print $e->getMessage();
	}

	echo '<pre>' . var_export($cac, true) . '</pre>';

## Requis

PHP5 et [Carbon](https://github.com/briannesbitt/carbon).


## Composer

Je vous conseille vivement l'utilisation de [Composer](https://getcomposer.org/).
Vous pouvez ajouter ce package en tapant la commande suivante dans votre terminal :

    composer require rypsx/commeaucinema

Ou en éditant le fichier `composer.json`, tel que :

    {
    "require": {
      "rypsx/commeaucinema": "^2.x"
    }
 

### Version 2.0
- Possibilité d'avoir la bande annonce de 2 manières :
	- 1e : Pas fiable, méthode de manipulation de lien (Exec time : 500ms)
	- 2e : Fiable, parse du site en récupérant la BA (Exec time : Variable entre 3.5s-6.5s)

---

## English Version <a id="english"></a> 

# API PHP commeaucinema.com

This package allows you to extract the main RSS feed commeaucinema.com. It was produced by pure need, because the flash widgets offered on the site are for me overwhelmed.

## Presentation

This package will get you :

1. Cinema releases for this week
2. Films now showing
3. The list of films to be released soon

Objects you get :

	object(Rypsx\Commeaucinema\Cinema)[4]
		public 'erreur' => 
		array (size=0)
		  ...
		public 'titre' => string 'Belle et Sébastien 3, le dernier chapitre' (length=42)
		public 'lien' => string 'http://www.commeaucinema.com/film/belle-et-sebastien-3-le-dernier-chapitre,361544' (length=81)
		public 'description' => string 'Aventure Film à partir de 6/8 ansDurée : 1h37' (length=47)
		public 'image' => string 'http://www.commeaucinema.com/images/news/133_361544.jpg' (length=55)
		public 'ba' => string '"http://videos.commeaucinema.com/m4v/belleetsebastien3_fa.m4v"' (length=62)

## Usage

	use Rypsx\Commeaucinema\Commeaucinema;

	require __DIR__ . '/../vendor/autoload.php';

	try {
	    $cac = new Commeaucinema();
	} catch (Exception $e) {
	    print $e->getMessage();
	}

	echo '<pre>' . var_export($cac, true) . '</pre>';

## Required

PHP5 and [Carbon](https://github.com/briannesbitt/carbon).


## Composer

I highly recommend the use of [Composer](https://getcomposer.org/).
You can add this package by typing the following command in your terminal:

    composer require rypsx/commeaucinema

Or by editing the `composer.json` file, such as:

    {
    "require": {
      "rypsx/commeaucinema": "^2.x"
    }

### Version 2.0
- Possibility of having the trailer of 2 ways :
	- 1e : Not reliable, link manipulation method (Exec time : 500ms)
	- 2e : Reliable, parse of the site by recovering the trailer (Exec time : Variable btw 3.5s-6.5s)

## Packagist

[Packagist Repo URL](https://packagist.org/packages/rypsx/commeaucinema)

## License

**The MIT License (MIT)**

**Copyright (c) 2016 RypsX Dev**

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.