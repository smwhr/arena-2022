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

  public function __construct($x, $y, $direction = self::NORTH){
    $this->x = $x;
    $this->y = $y;
    $this->direction = $direction;
  }

  public function getX(){
    return $this->x;
  }
  public function getY(){
    return $this->y;
  }
  public function getDirection(){
    return $this->direction;
  }

  public function rotate($sens){
    $newSens = [
      self::RIGHT =>[
        self::NORTH => self::EAST,
        self::EAST =>  self::SOUTH,
        self::SOUTH => self::WEST,
        self::WEST => self::NORTH,
      ],
      self::LEFT =>[
        self::NORTH => self::WEST,
        self::EAST => self::NORTH,
        self::SOUTH => self::EAST,
        self::WEST => self::SOUTH,
      ]
    ];
    
    return new Position(
      $this->getX(),
      $this->getY(),
      $newSens[$sens][$this->getDirection()]
    );
  }
}