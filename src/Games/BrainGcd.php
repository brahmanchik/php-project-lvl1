#!/usr/bin/env php
<?php

namespace BrainGames\Games\Gcd;

/*
 * пользователю показывается два случайных числа, например, 25 50.
 * Пользователь должен вычислить и ввести наибольший общий делитель этих чисел.
 */
use function BrainGames\Engine\playRound;
use const BrainGames\Engine\NUMBER_OF_ROUNDS; //  количество раундов в игре
const MIN_VALUE = 0;
const MAX_VALUE = 100;
const RULES_GAME = "Find the greatest common divisor of given numbers.";
//Функция использующая алгоритм Евклида, чтобы найти НОД
function gcd(int $a, int $b): int
{
    while ($b != 0) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }
    return $a;
}
function generateQuestionAndAnswer(): array
{
    //показывается два случайных числа, например, 25 50.
    //Пользователь должен вычислить и ввести наибольший общий делитель этих чисел.
    $numberOne = rand(MIN_VALUE, MAX_VALUE);
    $numberTwo = rand(MIN_VALUE, MAX_VALUE);
    $gcdResult = strval(gcd($numberOne, $numberTwo)); // Наибольший общий делитель
    $question = "{$numberOne} {$numberTwo}";
    return [$question, $gcdResult]; //$возвращаю массив из 2 элементов, выражение и ответа на это выражение
}
function playGcdGame()
{
    for ($roundIndex = 0; $roundIndex < NUMBER_OF_ROUNDS; $roundIndex++) {
        $roundData[] = generateQuestionAndAnswer(); // содержит вопрос, и правильный ответ
    }
    playRound($roundData, RULES_GAME); // отправляю всю логику в движок
}
