<?php

return array(

	/*
	| This is a Copy of Laravel Paths for my Framework - GoldenSniper
	|--------------------------------------------------------------------------
	| Application Path
	|--------------------------------------------------------------------------
	| 
	| Here we just defined the path to the application directory. Most likely
	| you will never need to change this value as the default setup should
	| work perfectly fine for the vast majority of all our applications.
	|
	*/

	'app' => substr(__DIR__,0,strlen(__DIR__)-7),

	/*
	|--------------------------------------------------------------------------
	| Config Path
	|--------------------------------------------------------------------------
	| 
	| Aqui se toma la ruta a la carpeta de Configuracion del Proyecto
	| 
	*/

	'config' => __DIR__,

	/*
	|--------------------------------------------------------------------------
	| Public Path
	|--------------------------------------------------------------------------
	|
	| The public path contains the assets for your web application, such as
	| your JavaScript and CSS files, and also contains the primary entry
	| point for web requests into these applications from the outside.
	|
	*/

	'public' => 'http://'.$_SERVER['HTTP_HOST'].rtrim($_SERVER['PHP_SELF'],'index.php').'public',

	/*
	|--------------------------------------------------------------------------
	| Public Path Absoluto
	|--------------------------------------------------------------------------
	|
	| Aqui se coloca la direccion absoluta independiente del servidor, de la
	| carpeta public para su necesidad
	|
	*/

	'public_absolute' => substr(__DIR__,0,strlen(__DIR__)-10).'public'.DIRECTORY_SEPARATOR,


	/*
	|--------------------------------------------------------------------------
	| Base Path
	|--------------------------------------------------------------------------
	|
	| The base path is the root of the Laravel installation. Most likely you
	| will not need to change this value. But, if for some wild reason it
	| is necessary you will do so here, just proceed with some caution.
	|
	*/

	'base' => 'http://'.$_SERVER['HTTP_HOST'].str_replace('/index.php', '',$_SERVER['PHP_SELF'])
);

