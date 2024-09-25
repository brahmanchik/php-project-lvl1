#!/usr/bin/env php
<?php

namespace Games\Brain\Prime;

/*
 * В игре показывается число и надо сказать простое оно или нет
 */
use function BrainGames\Engine\counter;
use function BrainGames\Engine\playRound;
use function BrainGames\Engine\greeting;

function gameLogic(): array
{
    $primeNumbers = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31]; // список простых чисел
    $numbers = [1, 2, 3, 4, 5, 6, 7, 9, 11, 12, 13, 15, 17, 18, 19, 21, 23, 25, 29, 30, 31];
    $randomNumber = $numbers[array_rand($numbers, 1)];
    if (in_array($randomNumber, $primeNumbers)) {
        $correctAnswer = "yes"; //число простое
    } else {
        $correctAnswer = "no";
    }
    return [$randomNumber, $correctAnswer]; //$возвращаю массив из 2 элементов, число и ответ простое это число или нет
}
function playPrimeGame()
{
    $name = greeting();
    for ($roundIndex = 0; $roundIndex < counter(); $roundIndex++) {
        $rulesGame = "Answer \"yes\" if given number is prime. Otherwise answer \"no\".";
        $roundData = gameLogic(); // содержит вопрос, и правильный ответ
        playRound($roundData, $roundIndex, $rulesGame, $name); // отправляю всю логику в движок
    }
}
