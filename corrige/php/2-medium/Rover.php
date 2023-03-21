<?php

declare(strict_types=1);

namespace App;

class Rover
{
    private string $direction;
    private int $y;
    private int $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }

    public function receive(string $commandsSequence): void
    {
        $directions = ["N" => ["W", "E"], "S" => ["E", "W"], "W" => ["S", "N"], "E" => ["N", "S"]];
        $movement = ["f" => [0, 1], "b" => [0, -1]];
        $commandsSequenceLenght = strlen($commandsSequence);

        for ($i = 0; $i < $commandsSequenceLenght; $i++) {
            $command = substr($commandsSequence, $i, 1);

            if (array_key_exists($command, $directions)) {
                $this->direction = $directions[$this->direction][$command === "r" ? 1 : 0];
                
            } elseif (array_key_exists($command, $movement)) {
                [$x, $y] = $movement[$command];

                if ($this->direction === "N" || $this->direction === "S") {
                    $this->y += $y * ($this->direction === "S" ? -1 : 1);
                } else {
                    $this->x += $x * ($this->direction === "W" ? -1 : 1);
                }
            }
        }
    }
}