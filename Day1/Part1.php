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

sort($leftNumbers, SORT_NUMERIC);
sort($rightNumbers, SORT_NUMERIC);

foreach ($leftNumbers as $key => $leftNumberValue) {
    $result += abs($leftNumberValue - $rightNumbers[$key]);
}

var_dump($result);

// 2066446