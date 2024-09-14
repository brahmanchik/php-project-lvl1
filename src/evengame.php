<?php

namespace BrainGames\even;
use function cli\line;
use function cli\prompt;

function getName()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
function playEvenGame($name)
{

    $correctAnswersCount = 0; //счетчик правильных ответов, чтобы выйграть, надо 3 правильных ответа
    line("Answer \"yes\" if the number is even, otherwise answer \"no\".");
    do {
        $hiddenNumber = rand(1, 100);
        if ($hiddenNumber % 2 == 0) {
            $correctAnswer = "yes"; //правильный ответ будет "yes", если число четное
        } else {
            $correctAnswer = "no"; // если число не четное, то правильный ответ "no"
        }
        line("Question: %s", $hiddenNumber);
        $answer = prompt("Your answer: ");
        if ($answer == "yes" && $hiddenNumber % 2 == 0) {
            line("Correct!");
            $correctAnswersCount++;
        } elseif ($answer == "no" && $hiddenNumber % 2 !== 0) {
            line("Correct!");
            $correctAnswersCount++;
        } else {
            //если пользователь дал неверный ответ
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'. \nLet's try again, %s!",
                $answer,
                $correctAnswer,
                $name
            );
            die();
        }
    } while ($correctAnswersCount <= 2);

    if ($correctAnswersCount === 3) {
        line("Congratulations, %s!", $name);
    }
}

