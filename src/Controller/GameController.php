<?php
namespace RobotWar\Controller;

use \RobotWar\Arena;
use \RobotWar\Robot;
use \RobotWar\Game;


class GameController{

  public function startAction(){
    $robot1 = new \Player\DoNothingBot("Bobby");
    $robot2 = new \Player\DoNothingBot("Dylan");

    $board_file = "../data/simple.txt";
    $arena = new Arena($board_file);

    
    $game  = new Game(
      [$robot1, $robot2],
      $arena
    );

    $_SESSION["game"] = $game;
    $this -> include_body("../templates/start.html.php");
  }


  public function include_body($path) {
    include("../templates/header.html.php");
    include($path);
    include("../templates/footer.html.php");
  }

  public function nextAction(){
    $game = $_SESSION["game"];
    
    try{
       $turn_report = $game->nextTurn();
       $_SESSION["game"] = $game;
    }catch(WinningCondition $e){
      $this -> include_body("../templates/winner.html.php");
      return;
    }

    $this -> include_body("../templates/game.html.php");
  }

}
