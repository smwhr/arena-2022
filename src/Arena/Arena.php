<?php
namespace RobotWar\Arena;

class Arena{
    public $map;

    public function __construct($file){
      $tab = file_get_contents($file);
      $tab = explode("\n", $tab);
      foreach($tab as $key => $value){
        $tab[$key] = str_split($tab[$key]);
      }
      $this->map = $tab;
      $wall = new Wall();
      $wall->sign =
      $empty = new Empty();
      $empty->sign =
      $spawnpoint = new Spawnpoint();
      $spawnpoint->sign = 
    }

    public function spawn($letter, Robot $robot): Position{
        // @todo
        $p = new Position(3,3);
        // var_dump($p);
        return $p;
    }
}
