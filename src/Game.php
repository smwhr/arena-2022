<?php
namespace RobotWar;

use RobotWar\Robot\Action;
use RobotWar\Robot\Advance;
use RobotWar\Robot\TurnLeft;
use RobotWar\Robot\TurnRight;
use RobotWar\Robot\Fire;


use RobotWar\Position;



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
        $this->positionManager->canMove($letter);
      }else{
        return true;
      }
  }

  public function nextTurn(){
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

  public function do($letter, Action $action){
    switch(get_class($action)){
        case 'RobotWar\Robot\Advance':
          $this->positionManager->move($letter);
          return sprintf('%s make a move.',
            $this->robots[$letter]
              ->getName());
        
        case 'RobotWar\Robot\TurnLeft':
          $this->positionManager->rotate($letter, Position::LEFT);
          return sprintf('%s turned left.',
                          $this->robots[$letter]
                               ->getName());
        
        case 'RobotWar\Robot\TurnRight':
          $this->positionManager->rotate($letter, Position::RIGHT);
          return sprintf('%s turned right.',
                          $this->robots[$letter]
                               ->getName());
        
        case 'RobotWar\Robot\Fire':
          // Ilan bosse ici
          break;
    }
  }
}