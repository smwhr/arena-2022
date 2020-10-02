<?php
namespace RobotWar;

use RobotWar\Robot\Action;
use RobotWar\Robot\Advance;

class Game{

  private $lifeManager;
  private $positionManager;
  private $robots;

  public function __construct(
      $robots, $arena
  ){

    $positionManager = new Manager\PositionManager($arena);
    foreach($robots as $r){
      $positionManager->addRobot($r);
    }

    $lifeManager = new Manager\LifeManager();
    foreach($robots as $r){
      $lifeManager->addRobot($r);
    }

    $this->lifeManager = $lifeManager;
    $this->positionManager = $positionManager;
    $this->robots = array_combine(
            ["A", "B"], 
            $robots
          );

  }

  public function can($letter,Action $action){
      if($action == Advance::class){
          $position = $this->positionManager->getPosition($letter);
          $posX = $position->getX();
          $posY = $position->getY();
          $direction = $position->getDirection();
          switch ($direction){
              case "N":
                  if ($position->getCell($posX,$posY-1) != ""){
                      return false;
                  }
                  break;

              case "E":
                  if ($position->getCell($posX+1,$posY) != ""){
                      return false;
                  }
                  break;

              case "S":
                  if ($position->getCell($posX,$posY+1) != ""){
                      return false;
                  }
                  break;

              case "W":
                  if ($position->getCell($posX-1,$posY) != ""){
                      return false;
                  }
                  break;
          }
      }
      return true;
  }

  public function nextTurn(){
    // @todo
    /*
       1. transmettre à chaque robot
          les infos 
    */
    foreach($this->robots as $letter => $robot){
        $surroundings = $this->positionManager->getSurroundings($letter);
        $robot->setSurroundings($surroundings);
    }

    /*
      2. collecter le desir du robot
            desirs possibles :
              - tourner vers la droite
              - tourner vers la gauche
              - avancer
              - tirer
        */
    $actions = [];
    foreach($this->robots as $letter => $robot){
      $actions[$letter] = $robot->requestAction();
    }

    /*
        3. verifier que c'est possible
    */
    $actions = array_filter($actions, function($letter, $action){
      return $this->can($letter, $action);
    }, ARRAY_FILTER_USE_BOTH);

    /*
        4. effectuer
    */
    $report = [];
    foreach($actions as $letter => $action){
        $report[] = $this->do($letter, $action);
    }

    /*
        5. vérifier les conditions de victoire
    */
        $survivors = $this->lifeManager->getSurvivors();
        if(count($survivors) <= 1){
          throw new WinningCondition($survivors);
        }

        return $report;
  }
}