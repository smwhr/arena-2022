<?php

namespace Player;

use \RobotWar\Robot\Nothing;

class DoNothingBot extends \RobotWar\Robot{

  public function requestAction(){
    return new Nothing();
  }
  
}