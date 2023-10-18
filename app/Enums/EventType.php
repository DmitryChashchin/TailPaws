<?php


namespace App\Enums;



enum EventType:string {

    case Intake = 'intake';
    case Outcome = 'outcome';
    case Medical = 'medical';

}
