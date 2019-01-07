<?php
declare(strict_types=1);

namespace Connect4\Exception;

use RuntimeException;

final class NoPairPlayer extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Il faut un nombre pair de joueur pour jouer, veuillez mettre un nombre pair');
    }
}