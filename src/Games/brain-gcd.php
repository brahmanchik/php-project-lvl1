#!/usr/bin/env php
<?php

namespace Games\Brain\Gcd;

/*
 * пользователю показывается два случайных числа, например, 25 50.
 * Пользователь должен вычислить и ввести наибольший общий делитель этих чисел.
 */
use function BrainGames\Engine\counter;
use function BrainGames\Engine\playRound;
use function BrainGames\Engine\greeting;

function gameLogic(): array
{
    //генерирую случайное математическое выражение вида 2 + 2
    $numberOne = rand(1, 100);
    $numberTwo = rand(1, 100);
    $correctAnswer = strval(gmp_gcd($numberOne, $numberTwo)); // Наибольший общий делитель
    $question = "{$numberOne} {$numberTwo}";
    return [$question, $correctAnswer]; //$возвращаю массив из 2 элементов, выражение и ответа на это выражение
}
function playGcdGame()
{
    $name = greeting();
    for ($roundIndex = 0; $roundIndex < counter(); $roundIndex++) {
        $rulesGame = "Find the greatest common divisor of given numbers.";
        $roundData = gameLogic(); // содержит вопрос, и правильный ответ
        playRound($roundData, $roundIndex, $rulesGame, $name); // отправляю всю логику в движок
    }
}
