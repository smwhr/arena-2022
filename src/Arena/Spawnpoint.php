<?php
namespace RobotWar\Arena;

class Spawnpoint implements Walkable, FireTraversable
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
