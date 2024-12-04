<?php

require_once('../functions.php');

function solveWithRegex(): int
{
    $inputForRegex = getPuzzleText('Day4');

    $result = 0;

    // → XMAS
    preg_match_all('#XMAS#s', $inputForRegex, $rightMatches);
    $result += count($rightMatches[0]);

    // ← SAMX
    preg_match_all('#SAMX#s', $inputForRegex, $leftMatches);
    $result += count($leftMatches[0]);


    // ↑ (?=(S).{140}(A).{140}(M).{140}(X))
    preg_match_all('#(?=(S).{140}(A).{140}(M).{140}(X))#s', $inputForRegex, $upMatches);
    $result += count($upMatches[0]);


    // ↓ (?=(X).{140}(M).{140}(A).{140}(S))
    preg_match_all('#(?=(X).{140}(M).{140}(A).{140}(S))#s', $inputForRegex, $downMatches);
    $result += count($downMatches[0]);


    // ↗︎ (?=(S).{139}(A).{139}(M).{139}(X))
    preg_match_all('#(?=(S).{139}(A).{139}(M).{139}(X))#s', $inputForRegex, $upRightMatches);
    $result += count($upRightMatches[0]);


    // ↖︎ (?=(S).{141}(A).{141}(M).{141}(X))
    preg_match_all('#(?=(S).{141}(A).{141}(M).{141}(X))#s', $inputForRegex, $upLeftMatches);
    $result += count($upLeftMatches[0]);


    // ↘︎ (?=(X).{141}(M).{141}(A).{141}(S))
    preg_match_all('#(?=(X).{141}(M).{141}(A).{141}(S))#s', $inputForRegex, $downRightMatches);
    $result += count($downRightMatches[0]);


    // ↙︎ (?=(X).{139}(M).{139}(A).{139}(S))
    preg_match_all('#(?=(X).{139}(M).{139}(A).{139}(S))#s', $inputForRegex, $downLeftMatches);
    $result += count($downLeftMatches[0]);


    return $result;
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
            // →
            if (findPattern($matrix, 'XMAS', [$y, $x], [0, 1])) {
                $occurences++;
            }

            // ←
            if (findPattern($matrix, 'XMAS', [$y, $x], [0, 1])) {
                $occurences++;
            }

            // ↑
            if (findPattern($matrix, 'XMAS', [$y, $x], [-1, 0])) {
                $occurences++;
            }

            // ↓
            if (findPattern($matrix, 'XMAS', [$y, $x], [1, 0])) {
                $occurences++;
            }

            // ↗︎
            if (findPattern($matrix, 'XMAS', [$y, $x], [-1, 1])) {
                $occurences++;
            }

            // ↖︎
            if (findPattern($matrix, 'XMAS', [$y, $x], [-1, -1])) {
                $occurences++;
            }

            // ↘︎
            if (findPattern($matrix, 'XMAS', [$y, $x], [1, 1])) {
                $occurences++;
            }

            // ↙︎
            if (findPattern($matrix, 'XMAS', [$y, $x], [1, -1])) {
                $occurences++;
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