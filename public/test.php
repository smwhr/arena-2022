<?php
require_once("../vendor/autoload.php");

$robot1 = new Player\DoNothingBot("Bobby");
$robot2 = new Player\DoNothingBot("Dylan");

$board_file = "../data/simple.txt";
$arena = new RobotWar\Arena($board_file);

$game  = new RobotWar\Game(
  [$robot1, $robot2],
  $arena
);
