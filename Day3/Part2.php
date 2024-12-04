<?php

require_once('../functions.php');

$puzzleInput = getPuzzleText('Day3');
$testInput = "xmul(2,4)&mul[3,7]!^don't()_mul(5,5)+mul(32,64](mul(11,8)undo()?mul(8,5))";

function resolve($input): int
{
    $result = 0;
    $canConsider = true;

    /*$puzzleInput = preg_replace("#don't\(\)(.*?)do\(\)#", '', $input);

    preg_match_all('#mul\(([0-9]*),([0-9]*)\)#', $puzzleInput, $matches);
    var_dump($matches);

    foreach ($matches[1] as $key => $value) {
        $result += $matches[1][$key] * $matches[2][$key];
    }*/

    preg_match_all("#mul\((\d+),(\d+)\)|do\(\)|don't\(\)#", $input, $matches);

    foreach ($matches[0] as $key => $match) {
        if (str_contains($match, 'mul') && $canConsider) {
            $result += $matches[1][$key] * $matches[2][$key];
        } elseif (str_contains($match, 'do()')) {
            $canConsider = true;
        } else {
            $canConsider = false;
        }
    }

    return $result;
}

var_dump(resolve($puzzleInput));