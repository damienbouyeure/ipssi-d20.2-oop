<?php

declare(strict_types=1);
use Connect4\Factory\Game;
use Support\Factory;
use Support\Renderer;
use Support\Service;
use Connect4\Service as Connect4Service;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'games' => [
        'connect4' => Connect4Service\Game::class,
    ],
    'service_manager' => [
        'factories' => [
            Renderer\Output::class => Factory\Renderer\Output::class,
            Connect4Service\Game::class => Game::class,
            // InvokableFactory can be used when the service does not need any constructor argument
            Service\PseudoRandomValue::class => InvokableFactory::class,
        ],
        'aliases' => [
            Service\RandomValue::class => Service\PseudoRandomValue::class,
        ],
    ]
];