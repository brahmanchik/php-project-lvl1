#!/usr/bin/env php
<?php

namespace Games\Brain\Calc;

/*
 * Игра по правилам, аля угадай сколько будет 2 + 2
 */
use function BrainGames\Engine\counter;
use function BrainGames\Engine\playRound;
use function BrainGames\Engine\greeting;

function gameLogic(): array
{
    //генерирую случайное математическое выражение вида 2 + 2
    $operationSymbols = ["+", "-", "*"];
    $operationSymbol = $operationSymbols[array_rand($operationSymbols, 1)];
    $numberOne = rand(0, 100);
    $numberTwo = rand(0, 100);
    $question = "{$numberOne} {$operationSymbol[0]} {$numberTwo}"; // вопрос в виде математического выражения
    switch ($operationSymbol) {
        case "+":
            $answer = $numberOne + $numberTwo; //выбор правильного ответа на загадный вопрос ниже
            break;
        case "-":
            $answer = $numberOne - $numberTwo;
            break;
        case "*":
            $answer = $numberOne * $numberTwo;
            break;
    }
    return [$question, $answer]; //$возвращаю массив из выражения и ответа на это выражение
}
function playCalcGame()
{
    $name = greeting();
    for ($roundIndex = 0; $roundIndex < counter(); $roundIndex++) {
        $rulesGame = "What is the result of the expression?";
        $roundData = gameLogic(); // содержит вопрос, и правильный ответ
        playRound($roundData, $roundIndex, $rulesGame, $name); // отправляю всю логику в движок
    }
}
