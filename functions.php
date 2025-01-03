<?php

function getPuzzleArray($day): array
{
    $puzzleInput = trim(file_get_contents(__DIR__ . '/'. $day . '/input.txt'));

    return explode(PHP_EOL, $puzzleInput);
}

function getTestArray($testInput): array
{
    return explode(PHP_EOL, $testInput);
}

function getPuzzleText($day): string
{
    return trim(file_get_contents(__DIR__ . '/'. $day . '/input.txt'));
}