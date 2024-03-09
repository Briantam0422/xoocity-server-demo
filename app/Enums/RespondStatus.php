<?php

namespace App\Enums;

enum RespondStatus:int{
    case ok = 200;
    case SystemError = 500;
    case NotFound = 400;
    case Unauthorized = 401;
}
