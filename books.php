<?php
const DS = DIRECTORY_SEPARATOR;
require 'vendor'.DS.'mustache'.DS.'mustache'.DS.'src'.DS.'Mustache'.DS.'Autoloader.php';
include 'service.php';

Mustache_Autoloader::register();

$m = new Mustache_Engine(array('loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/templates')));

$template = $m-> loadTemplate('page');

//echo $bookstemp->render();
echo $template->render(array('books' => $_SESSION["service"]));
