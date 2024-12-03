<?php

require_once('../functions.php');

$puzzleInput = getPuzzleText('Day3');
$testInput = 'xmul(2,444)%&mul[3,7]!@^do_not_mul(5,5)+mul(32,64]then(mul(11,8)mul(8,5))';

$result = 0;

preg_match_all('#mul\(([0-9]*),([0-9]*)\)#', $puzzleInput, $matches);

foreach ($matches[1] as $key => $value) {
    $result += $matches[1][$key] * $matches[2][$key];
}

var_dump($result);