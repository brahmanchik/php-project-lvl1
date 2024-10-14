#!/usr/bin/env php
<?php

namespace BrainGames\Games\Calc;

/*
 * Игра по правилам, аля угадай сколько будет 2 + 2
 */
use function BrainGames\Engine\playRound;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const MIN_VALUE = 0;
const MAX_VALUE = 100;
const RULES_GAME = 'What is the result of the expression?';
function calculateResult(string $operationSymbol, int $numberOne, int $numberTwo)
{
    switch ($operationSymbol) {
        case '+':
            $result = $numberOne + $numberTwo;
            return $result;
        case '-':
            $result = $numberOne - $numberTwo;
            return $result;
        case '*':
            $result = $numberOne * $numberTwo;
            return $result;
        default:
            print_r("Error: operator '{$operationSymbol}' is not provided.\n");
            break;
    }
}

function generateQuestionAndAnswer(): array
{
    //генерирую случайное математическое выражение вида 2 + 2
    $operationSymbols = ['+', '-', '*'];
    $operationSymbol = $operationSymbols[array_rand($operationSymbols, 1)];
    $numberOne = rand(MIN_VALUE, MAX_VALUE);
    $numberTwo = rand(MIN_VALUE, MAX_VALUE);
    $question = "{$numberOne} {$operationSymbol} {$numberTwo}"; // вопрос в виде математического выражения
    $answer = calculateResult($operationSymbol, $numberOne, $numberTwo);
    return [$question, (string) $answer]; //возвращаю массив из выражения и ответа на это выражение
}
function playCalcGame()
{
    $roundData = [];
    for ($roundIndex = 1; $roundIndex <= NUMBER_OF_ROUNDS; $roundIndex++) {
        $roundData[] = generateQuestionAndAnswer(); // содержит вопрос 0-ым значением, и правильный ответ значением 1
    }
    playRound($roundData, RULES_GAME); // отправляю данные в движок
}
