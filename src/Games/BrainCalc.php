#!/usr/bin/env php
<?php

namespace BrainGames\Games\Calc;

/*
 * Игра по правилам, аля угадай сколько будет 2 + 2
 */
use function BrainGames\Engine\playRound;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

//  количество раундов в игре
const MIN_VALUE = 0;
const MAX_VALUE = 100;
const RULES_GAME = "What is the result of the expression?";
function calculateResult(string $operationSymbol, int $numberOne, int $numberTwo): int
{
    $result = 0;
    switch ($operationSymbol) {
        case "+":
            $result = $numberOne + $numberTwo;
            break;
        case "-":
            $result = $numberOne - $numberTwo;
            break;
        case "*":
            $result = $numberOne * $numberTwo;
            break;
        default:
            print_r("Error: operator '{$operationSymbol}' is not provided.\n");
            break; // Можно добавить break и здесь для симметрии
    }
    return $result;
}

function generateQuestionAndAnswer(): array
{
    //генерирую случайное математическое выражение вида 2 + 2
    $operationSymbols = ["+", "-", "*"];
    $operationSymbol = $operationSymbols[array_rand($operationSymbols, 1)];
    $numberOne = rand(MIN_VALUE, MAX_VALUE);
    $numberTwo = rand(MIN_VALUE, MAX_VALUE);
    $question = "{$numberOne} {$operationSymbol[0]} {$numberTwo}"; // вопрос в виде математического выражения
    $answer = calculateResult($operationSymbol, $numberOne, $numberTwo);
    return [$question, $answer]; //возвращаю массив из выражения и ответа на это выражение
}
function playCalcGame()
{
    $roundData = [];
    for ($roundIndex = 0; $roundIndex < NUMBER_OF_ROUNDS; $roundIndex++) {
        $roundData[] = generateQuestionAndAnswer(); // содержит вопрос 0-ым значением, и правильный ответ значением 1
    }
    playRound($roundData, RULES_GAME); // отправляю данные в движок
}
