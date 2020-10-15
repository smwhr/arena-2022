<?php

namespace RobotWar\Robot;

interface RobotInterface{


    public function setSurroundings($surroundings);

    public function requestAction();

    public function getName();

}
