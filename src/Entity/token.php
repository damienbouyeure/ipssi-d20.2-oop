<?php
declare(strict_types=1);
namespace Connect4\Entity;


class token
{
    private const YELLOW = 'jaune';
    private const RED = 'rouge';
    private $color;
    private function __construct(string $color)
    {
        $this->color = $color;
    }
    public function toString(): string
    {
        return $this->color;
    }
    public static function createYellow(): Token
    {
        return new self(self::YELLOW);
    }

    public static function createRed(): Token
    {
        return new self(self::RED);
    }
}