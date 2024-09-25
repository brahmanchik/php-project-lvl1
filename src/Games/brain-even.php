#!/usr/bin/env php
<?php

/*
 * Простая игра, угадай четное или не четное число
 */
namespace Games\Brain\Even;

use function BrainGames\Engine\counter;
use function BrainGames\Engine\playRound;
use function BrainGames\Engine\greeting;

function gameLogic(): array
{
    $hiddenNumber = rand(1, 100);
    if ($hiddenNumber % 2 == 0) {
         return [$hiddenNumber, "yes"]; //$correctAnswer правильный ответ будет "yes", если число четное
    } else {
        return  [$hiddenNumber, "no"]; // $correctAnswer если число не четное, то правильный ответ "no"
    }
}

function playEvenGame()
{
    $name = greeting();
    for ($roundIndex = 0; $roundIndex < counter(); $roundIndex++) {
        $rulesGame = "Answer \"yes\" if the number is even, otherwise answer \"no\".";
        $roundData = gameLogic(); // содержит вопрос, и правильный ответ
        playRound($roundData, $roundIndex, $rulesGame, $name); // отправляю всю логику в движок
    }
}
