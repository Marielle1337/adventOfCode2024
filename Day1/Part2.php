<?php

$puzzleInput = trim(file_get_contents(__DIR__ . '/Day1_Puzzle.txt'));

$puzzleArray = explode(PHP_EOL, $puzzleInput);

$result = 0;

$leftNumbers = [];
$rightNumbers = [];

foreach ($puzzleArray as $input) {
    $number = explode('   ', (trim($input)));
    $leftNumbers[] = (int)$number[0];
    $rightNumbers[] = (int)$number[1];
}

$countOccurencesOfRightNumbers = array_count_values($rightNumbers);

foreach ($leftNumbers as $leftNumberValue) {
    if (isset($countOccurencesOfRightNumbers[$leftNumberValue])) {
        $result += $leftNumberValue * $countOccurencesOfRightNumbers[$leftNumberValue];
    }
}

var_dump($result);

// 24931009