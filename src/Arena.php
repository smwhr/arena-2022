<?php
namespace RobotWar;

class Arena{
    public $map;

    public function __construct($file){
      $tab = file_get_contents($file);
      $tab = explode("\n", $tab);
      foreach($tab as $key => $value){
        $tab[$key] = str_split($tab[$key]);
      }
      $this->map = $tab;
      $wall = new Arena\Wall();
      $empty = new Arena\EmptySpace();
      $spawnpoint = new Arena\Spawnpoint();
    }

    public function spawn($letter, Robot $robot): Position{
        // @todo
        $p = new Position(3,3);
        // var_dump($p);
        return $p;
    }
}
