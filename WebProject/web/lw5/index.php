<?php
require_once 'f:\Study\7_Semester\Web-BackEnd\WebProject\vendor\autoload.php';

$loader = new Twig_Loader_Filesystem('f:\Study\7_Semester\Web-BackEnd\WebProject\app\Resources\views\htmlTemplates');

$twig = new Twig_Environment($loader, array('debug' => true));
echo $twig->render('template5Lab.html.twig');