<?php

session_start();
require_once("../vendor/autoload.php");

// on récupère l'url
$url = $_SERVER["REQUEST_URI"];

// on récupère le path
$path = parse_url($url, PHP_URL_PATH);


$gcCtrl = new RobotWar\Controller\GameController();

if($path == "/"){
  $gcCtrl->startAction();
}
if($path == "/next"){
  $gcCtrl->nextAction();
}


