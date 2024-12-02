<?php

require_once('../functions.php');

$puzzleArray = getPuzzleArray('Day1');

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