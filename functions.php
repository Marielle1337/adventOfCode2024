<?php

function getPuzzleArray($day): array
{
    $puzzleInput = trim(file_get_contents(__DIR__ . '/'. $day . '/Puzzle.txt'));
    var_dump(__DIR__ . '/'. $day . '/Puzzle.txt');

    return $puzzleArray = explode(PHP_EOL, $puzzleInput);
}