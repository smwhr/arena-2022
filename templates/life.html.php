<?php
include("../templates/header.html.php");
include("../Manager/LifeManager.php");

use Manager\LifeManager;

use RobotWar\Robot;

class LifeManager{
  
  private $spawnPosition;
  private $lives;

  public function __construct(){
      $this->spawnPosition = "A";
      $this->lives = [];
  }

  public function addRobot(Robot $robot){

      $this->lives[$this->spawnPosition] = 10;

      if($this->spawnPosition == "A"){
        $this->spawnPosition = "B";
      }
  }
}

?>