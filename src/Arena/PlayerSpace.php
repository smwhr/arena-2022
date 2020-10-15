<?php
namespace RobotWar\Arena;

class PlayerSpace
{
  private $letter;

  public function __construct($letter){
    $this->letter = $letter;
  }

  public function getLetter(){
    return $this->letter;
  }

}

 ?>
