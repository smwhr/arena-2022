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
    }

    public function spawn($letter, Robot $robot): Position{
        // @todo

        return new Position(3,3);
    }
}