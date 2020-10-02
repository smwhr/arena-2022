<?php
namespace RobotWar\Manager;

use RobotWar\Robot;
use RobotWar\Position;

class PositionManager{
  
  private $arena;
  private $spawnPosition;

  private $positions;


  public function __construct($arena){
      $this->arena = $arena;
      $this->spawnPosition = "A";
      $this->positions = [];
  }

  public function addRobot(Robot $robot){
      $positionInitiale = 
      $this->arena->spawn($this->spawnPosition, $robot);

      $this->positions[$this->spawnPosition] = $positionInitiale;

      if($this->spawnPosition == "A"){
        $this->spawnPosition = "B";
      }
  }

  public function rotate($letter, $sens){
        $this->positions[$letter]
            = $this->positions[$letter]->rotate($sens);
  }
}