<?php

namespace RobotWar\Manager;

use RobotWar\Robot;

class LifeManager
{

  private $spawnPosition;
  private $lives;

  public function __construct()
  {
    $this->spawnPosition = "A";
    $this->lives = [];
  }

  public function get_life()
  {
    return $this->lives;
  }

  public function get_SpawnLetter()
  {
    return $this->spawnPosition;
  }


  public function CountSurvivor()
  {
    $survivor = strlen(get_life());
    $robotlife = $this->lifeManager->get_life();
    foreach ($robotlife as &$value)
      if ($value <= 0) {
        $survivor = $survivor - 1;
      };
    return $survivor;
  }

  public function addRobot(Robot $robot)
  {

    $this->lives[$this->spawnPosition] = 10;

    if ($this->spawnPosition == "A") {
      $this->spawnPosition = "B";
    }
  }
}