<?php

namespace RobotWar\Manager;

use RobotWar\Robot;
use RobotWar\Position;
use RobotWar\Robot\Advance;

class PositionManager
{

  private $arena;
  private $spawnPosition;

  private $positions;


  public function __construct($arena)
  {
    $this->arena = $arena;
    $this->spawnPosition = "A";
    $this->positions = [];
  }

  public function addRobot(Robot $robot)
  {
    $positionInitiale =
      $this->arena->spawn($this->spawnPosition, $robot);

    $this->positions[$this->spawnPosition] = $positionInitiale;

    if ($this->spawnPosition == "A") {
      $this->spawnPosition = "B";
    }
  }


  public function getPosition($letter)
  {
    return $this->positions[$letter];
  }

  public function rotate($letter, $sens)
  {
    $this->positions[$letter]
      = $this->positions[$letter]->rotate($sens);
  }

  public function canMove($letter)
  {

    $position = $this->getPosition($letter);
    $posX = $position->getX();
    $posY = $position->getY();
    $direction = $position->getDirection();
    switch ($direction) {
      case "N":
        if ($position->getCell($posX, $posY - 1) != "") {
          return false;
        }
        break;

      case "E":
        if ($position->getCell($posX + 1, $posY) != "") {
          return false;
        }
        break;

      case "S":
        if ($position->getCell($posX, $posY + 1) != "") {
          return false;
        }
        break;

      case "W":
        if ($position->getCell($posX - 1, $posY) != "") {
          return false;
        }
        break;
    }
    return true;
  }

}