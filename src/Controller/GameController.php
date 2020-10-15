<?php
namespace RobotWar\Controller;

use \RobotWar\Arena;
use \RobotWar\Robot;
use \RobotWar\Game;

class GameController{

  public function startAction(){
    $robot1 = new Robot("Bobby");
    $robot2 = new Robot("Dylan");

    $board_file = "data/simple.txt";
    $arena = new Arena($board_file);

    $game  = new Game(
      [$robot1, $robot2],
      $arena
    );

    $_SESSION["game"] = $game;

    include("../templates/start.html.php");
  }


  public function nextAction(){
    $game = $_SESSION["game"];

    try{
      $turn_report = $game->nextTurn();
      $_SESSION["game"] = $game;

    }catch(WinningCondition $e){
      include("../templates/winner.html.php");
      return;
    }

    include("../templates/game.html.php");
  }

}

