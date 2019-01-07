<?php
declare(strict_types=1);

namespace Connect4;


interface Game extends \Support\Service\Game
{
    public static function playersFactory(int $numberOfPlayers): array;
}