<?php

function getPuzzleArray($day): array
{
    $puzzleInput = trim(file_get_contents(__DIR__ . '/'. $day . '/Puzzle.txt'));

    return explode(PHP_EOL, $puzzleInput);
}