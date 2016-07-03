commeaucinema.com PHP API
=======================

### [Access to English version](#english)

Ce package vous permet d'extraire les principaux flux RSS de commeaucinema.com . Il a été produit par pur besoin, car les widgets en flash proposés sur le site sont pour moi dépassés.

## Présentation

Ce package vous permet d'obtenir :

1. Les sorties cinéma de la semaine
2. Les films actuellement en salle
3. La liste des films qui sortiront prochainement

## Utilisation

```php
<?php

	use Rypsx\Commeaucinema\Commeaucinema;

	require __DIR__ . '/../vendor/autoload.php';

	try {
	    $cac = new Commeaucinema();
	} catch (Exception $e) {
	    print $e->getMessage();
	}

	var_dump($cac);
?>
```

## Requis

PHP5 et [Carbon](https://github.com/briannesbitt/carbon).


## Composer

Je vous conseille vivement l'utilisation de [Composer](https://getcomposer.org/).
Vous pouvez ajouter ce package en tapant la commande suivante dans votre terminal :

    composer require rypsx/commeaucinema

Ou en éditant le fichier `composer.json`, tel que :

    {
    "require": {
      "rypsx/commeaucinema": "^1.x"
    }
 
Merci de lire la licence en bas.

---

## English Readme Version <a id="english"></a> 
-------

# API PHP commeaucinema.com

This package allows you to extract the main RSS feed commeaucinema.com. It was produced by pure need, because the flash widgets offered on the site are for me overwhelmed.

## Presentation

This package will get you :

1. Cinema releases for this week
2. Films now showing
3. The list of films to be released soon

## Usage

```php
<?php

	use Rypsx\Commeaucinema\Commeaucinema;

	require __DIR__ . '/../vendor/autoload.php';

	try {
	    $cac = new Commeaucinema();
	} catch (Exception $e) {
	    print $e->getMessage();
	}

	var_dump($cac);
?>
```

## Required

PHP5 and [Carbon](https://github.com/briannesbitt/carbon).


## Composer

I highly recommend the use of [Composer](https://getcomposer.org/).
You can add this package by typing the following command in your terminal:

    composer require rypsx/commeaucinema

Or by editing the `composer.json` file, such as:

    {
    "require": {
      "rypsx/commeaucinema": "^1.x"
    }

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