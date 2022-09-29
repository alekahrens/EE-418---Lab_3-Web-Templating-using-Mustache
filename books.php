<?php
const DS = DIRECTORY_SEPARATOR;
require 'vendor'.DS.'mustache'.DS.'mustache'.DS.'src'.DS.'Mustache'.DS.'Autoloader.php';

Mustache_Autoloader::register();
//Ideally this function suppose to fetch data from database
//But for simplicity, we are going to use a simple json file
function getBooksData()
{
    $json = file_get_contents('data.json');
    return json_decode($json);
}

$books = getBooksData();

$m = new Mustache_Engine(array('loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/templates')));

$template = $m-> loadTemplate('page');

//echo $bookstemp->render();
echo $template->render(array('books' => $books));
