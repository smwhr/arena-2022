<?php
namespace RobotWar;

class Position{
  public $x;
  public $y;
  public $direction;

  const NORTH = "N";
  const EAST = "E";
  const SOUTH = "S";
  const WEST = "W";


  public function __construct($x, $y){
    $this->x = $x;
    $this->y = $y;
    $this->direction = self::NORTH;
  }
}