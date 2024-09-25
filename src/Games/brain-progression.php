#!/usr/bin/env php
<?php

namespace Games\Brain\Progression;

/*
 *Показываем игроку ряд чисел, образующий арифметическую прогрессию,
 * заменив любое из чисел двумя точками.
 * Игрок должен определить это число.
 */
use function BrainGames\Engine\counter;
use function BrainGames\Engine\playRound;
use function BrainGames\Engine\greeting;

function gameLogic(): array
{
    $progressionLength = rand(5, 10); // длина прогрессии
    $step = rand(2, 5); // шаг арифметической прогрессии
    $start = rand(1, 20); // начальное число прогрессии
    $progression = []; // массив для прогрессии

    // Заполнение прогрессии
    for ($i = 0; $i < $progressionLength; $i++) {
        $progression[] = $start + $i * $step; // вычисляем элементы прогрессии
    }

    // Выбор случайного индекса для скрытого числа
    $hiddenIndex = rand(0, $progressionLength - 1);
    $hiddenElement = $progression[$hiddenIndex]; // сохраняем скрытое число

    // Заменяем скрытое число на ".."
    $progression[$hiddenIndex] = '..';

    // Преобразуем прогрессию в строку для вывода
    $progressionString = implode(' ', $progression);

    return [$progressionString, $hiddenElement]; // возвращаем строку и скрытое число
}
function playProgressionGame()
{
    $name = greeting();
    for ($roundIndex = 0; $roundIndex < counter(); $roundIndex++) {
        $rulesGame = "What number is missing in the progression?";
        $roundData = gameLogic(); // содержит вопрос, и правильный ответ
        playRound($roundData, $roundIndex, $rulesGame, $name); // отправляю всю логику в движок
    }
}
