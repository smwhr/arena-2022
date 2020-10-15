<?php
namespace RobotWar;

abstract class Robot implements Robot\RobotInterface{

  private $name;
  private $surroundings;

  function __construct($name){
    $this->name = $name;
  }

  public function getName(){
    return $this->name;
  }

  public function setSurroundings($surroundings){
    $this->surroundings = $surroundings;
  }

}

