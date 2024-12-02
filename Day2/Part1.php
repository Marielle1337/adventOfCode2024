<?php

require_once('../functions.php');

$puzzleArray = getPuzzleArray('Day2');
$testArray = getTestArray(
'7 6 4 2 1
1 2 7 8 9
9 7 6 2 1
1 3 2 4 5
8 6 4 4 1
1 3 6 7 9');

function resolvePuzzle($input): int
{
    $result = 0;

    foreach ($input as $report) {
        $safeReport = true;
        $levels = explode(' ', $report);

        $sortLevels = $levels;
        $reverseSortLevels = $levels;
        sort($sortLevels);
        rsort($reverseSortLevels);

        if ($sortLevels === $levels || $reverseSortLevels === $levels) {
            foreach ($levels as $key => $level) {

                if (
                    isset ($levels[$key+1])
                    && (abs($levels[$key+1] - $level) < 1
                    || abs($levels[$key+1] - $level) > 3)
                    ) {
                        $safeReport = false;
                        continue;
                }
            }

            if ($safeReport === true) {
                $result++;
            }
        }
    }

    return $result;
}

var_dump(resolvePuzzle($puzzleArray)); // 502