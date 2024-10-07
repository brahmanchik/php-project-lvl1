#!/usr/bin/env php
<?php

/*
 * Простая игра, угадай четное или не четное число
 */
namespace BrainGames\Games\Even;

use function BrainGames\Engine\playRound;

use const BrainGames\Engine\NUMBER_OF_ROUNDS; //  количество раундов в игре
const MIN_VALUE = 0;
const MAX_VALUE = 100;
const RULES_GAME = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
function isEven($number)
{
    return $number % 2 === 0;
}
function generateQuestionAndAnswer(): array
{
    $randomNumber = rand(MIN_VALUE, MAX_VALUE);
    if (isEven($randomNumber)) {
         return [$randomNumber, "yes"]; //правильный ответ будет "yes", если число четное
    } else {
        return  [$randomNumber, "no"];
    }
}

function playEvenGame()
{
    for ($roundIndex = 0; $roundIndex < NUMBER_OF_ROUNDS; $roundIndex++) {
        $roundData[] = generateQuestionAndAnswer(); // содержит вопрос, и правильный ответ
    }
    playRound($roundData, RULES_GAME); // отправляю всю логику в движок
}
