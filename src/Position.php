<?php
namespace RobotWar;

class Position{
  private $x;
  private $y;
  private $direction;

  const NORTH = "N";
  const EAST = "E";
  const SOUTH = "S";
  const WEST = "W";

  const LEFT = "L";
  const RIGHT = "R";

  public function __construct($x, $y){
    $this->x = $x;
    $this->y = $y;
    $this->direction = self::NORTH;
  }
}