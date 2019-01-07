<?php
declare(strict_types=1);

namespace Connect4\Service;


use Connect4\Entity\Player;
use Connect4\Exception\NoPairPlayer;
use Connect4\Game as GameInterface;
use Support\Renderer\Output;
use Support\Service\RandomValue;
use Connect4\Entity\Participant;


final class Game implements GameInterface
{
    private $output;
    private $randomValueGenerator;
    private $participants;
    private $board;

    public function __construct(Output $output, RandomValue $randomValueGenerator, Participant ...$participants)
    {
        $this->validateTooManyParticipants($participants);
        $this->output = $output;
        $this->randomValueGenerator = $randomValueGenerator;
        $this->participants = $participants;
    }

    public function run(): Output
    {
        $this->output->writeLine(sprintf(
                'Initialisation du jeu avec %d participants.',
                count($this->participants))
        );

        $this->output->writeLine('Initialisation de la grille en 7 colonnes et 6 lignes.');
        $this->initBoard();
        return $this->output;
    }

    private function validateTooManyParticipants(array $participants): void
    {

        if (count($participants) % 2 != 0) {
            throw new NoPairPlayer();
        }
    }


    private function initBoard()
    {
        $this->board = [];
        $this->output->writeLine(str_pad('', 57, '-'));
        for ($row = 5; $row >= 0; --$row) {
            $rowPieces = [];
            for ($column = 6; $column >= 0; --$column) {
                $this->board[$row][$column] = null;
                $rowPieces[] = ' ' . str_pad((string)$this->board[$row][$column], 6, ' ');
            }

            $this->output->writeLine('|' . implode('|', $rowPieces) . '|');
            $this->output->writeLine(str_pad('', 57, '-'));
        }
    }


    public static function playersFactory(int $numberOfPlayers): array
    {
        $players = [];

        for ($playerNumber = 0; $playerNumber < $numberOfPlayers; ++$playerNumber) {
            $players[] = new Player($playerNumber + 1);
        }

        return $players;
    }
}