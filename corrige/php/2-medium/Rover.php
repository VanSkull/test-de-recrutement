<?php

/**
 *  Améliorations apportées :
 *  - Simplification des conditions d'assignation de direction et de déplacement
 *  - Ajout d'une condition à la section 'déplacement' pour éviter les  mauvaises instructions
 */

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
        $commandsSequenceLenght = strlen($commandsSequence);

        for ($i = 0; $i < $commandsSequenceLenght; ++$i) {
            $command = substr($commandsSequence, $i, 1);

            if ($command === "l" || $command === "r") {
                // Rotate Rover
                if ($this->direction === "N") {
                    $this->direction = $command === "r" ? "E" : "W";
                } else if ($this->direction === "S") {
                    $this->direction = $command === "r" ? "W" : "E";
                } else if ($this->direction === "W") {
                    $this->direction = $command === "r" ? "N" : "S";
                } else {
                    $this->direction = $command === "r" ? "S" : "N";
                }
            } else if ($command === "f" || $command === "b") {
                // Displace Rover
                $displacement = $command === 'f' ? 1 : -1;

                if ($this->direction === "N") {
                    $this->y += $displacement;
                } else if ($this->direction === "S") {
                    $this->y -= $displacement;
                } else if ($this->direction === "W") {
                    $this->x -= $displacement;
                } else {
                    $this->x += $displacement;
                }
            }
        }
    }
}