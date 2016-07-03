<?php

	use Rypsx\Commeaucinema\Commeaucinema;

	require __DIR__ . '/../vendor/autoload.php';

	try {
	    $cac = new Commeaucinema();
	} catch (Exception $e) {
	    print $e->getMessage();
	}

	var_dump($cac);
