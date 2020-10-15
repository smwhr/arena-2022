<?php
namespace RobotWar\Manager;

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

  public function getLifeFor($a){
    return $this-> lives[$a];
  }

  public function getSurvivors(){
    // @todo
    $tab_survivor = [];
    $survivor = $robot->getLifeFor();

    if(getLifeFor() >= 1){
      return $tab_survivor[$survivor];
    }
    else{
      return $tab_survivor[];
    }
    
  }
}