<?php

require_once('../functions.php');

function solveWithRegex(): int
{
    $inputForRegex = getPuzzleText('Day4');

    preg_match_all('#(?=(M|S).(M|S).{139}A.{139}(?!\2)(M|S).(?!\1)(M|S))#s', $inputForRegex, $matches);

    return count($matches[0]);
}

function solveWithMatrix(): int
{
    $occurences = 0;
    $inputForMatrix = getPuzzleArray('Day4');
    $matrix = [];

    foreach ($inputForMatrix as $inputLine) {
        $matrix[] = str_split($inputLine);
    }

    foreach ($matrix as $y => $row) {
        foreach ($row as $x => $column) {
            if (findPattern($matrix, 'MAS', [$y, $x], [1, 1]) || findPattern($matrix, 'SAM', [$y, $x], [1, 1])) {
                if (findPattern($matrix, 'MAS', [$y, $x], [1, -1]) || findPattern($matrix, 'SAM', [$y, $x], [1, -1])) {
                    $occurences++;
                }
            }
        }
    }

    return $occurences;
}

function findPattern(
    array $matrix,
    string $pattern,
    array $coordinates,
    array $step
    ): bool
{
    $maxY = count($matrix) - 1;
    $maxX = count($matrix[0]) -1;

    foreach (str_split($pattern) as $characterInPattern) {
        if ($coordinates[0] < 0 || $coordinates[0] > $maxY) {
            return false;
        }

        if ($coordinates[1] < 0 || $coordinates[1] > $maxX) {
            return false;
        }

        if ($characterInPattern !== $matrix[$coordinates[0]][$coordinates[1]]) {
            return false;
        }

        $coordinates[0] += $step[0];
        $coordinates[1] += $step[1];
    }


    return true;
}

var_dump('regex : ' . solveWithRegex());
var_dump('matrix : ' . solveWithMatrix());

/** For some reason, the regex solution works, and the matrix fail */