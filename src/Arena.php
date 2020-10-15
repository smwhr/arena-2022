<?php
namespace RobotWar;

class Arena{
    private $map;

    public function __construct($file){
      $tab = file_get_contents($file);
      $tab = explode("\n", $tab);
      foreach($tab as $key => $value){
        $tab[$key] = array_map(
            fn($s) => $this->translate($s), 
          str_split($tab[$key]));
      }
      $this->map = $tab;
    }

    private function translate($sign){
      switch($sign){
        case " ":
          return new Arena\EmptySpace();
        case "x":
          return new Arena\Wall();
        case "0":
          return new Arena\Water();
        case "A":
        case "B":
          return new Arena\Spawnpoint($sign);
      }

    }

    public function getMap(){
      return $this->map;
    }

    public function spawn($letter, Robot $robot): Position{
        // @todo
        $p = new Position(3,3);
        // var_dump($p);
        return $p;
    }

}
