#!/usr/bin/env php
<?php

namespace BrainGames\Games\Progression;

/*
 *Показываем игроку ряд чисел, образующий арифметическую прогрессию,
 * заменив любое из чисел двумя точками.
 * Игрок должен определить это число.
 */
use function BrainGames\Engine\playRound;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const MIN_LENGTH_PROGRESSION = 5;
const MAX_LENGTH_PROGRESSION = 10;
const MIN_STEP = 2;
const MAX_STEP = 5;
const MIN_BEGIN_PROGRESSION = 1;
const MAX_BEGIN_PROGRESSION = 20;
const RULES_GAME = 'What number is missing in the progression?';

function generateProgression(): array
{
    $length = rand(MIN_LENGTH_PROGRESSION, MAX_LENGTH_PROGRESSION);
    $step = rand(MIN_STEP, MAX_STEP); // шаг прогрессии
    $start = rand(MIN_BEGIN_PROGRESSION, MAX_BEGIN_PROGRESSION); // начальное число прогрессии
    $progression = range($start, $start + ($length - 1) * $step, $step);
    return $progression;
}
function hideElementInProgression(array $progression): array
{
    $hiddenIndex = rand(0, count($progression) - 1);
    $hiddenElement = $progression[$hiddenIndex];
    $progression[$hiddenIndex] = '..';
    $progressionString = implode(' ', $progression); // Преобразуем прогрессию в строку для вывода
    return [$progressionString, $hiddenElement];
}
function generateQuestionAndAnswer(): array
{
    // Генерация прогрессии
    $progression = generateProgression();
    // Скрытие элемента
    [$progressionString, $hiddenElement] = hideElementInProgression($progression);
    return [$progressionString, (string) $hiddenElement]; // возвращаем строку и скрытое число
}
function playProgressionGame()
{
    $roundData = [];
    for ($roundIndex = 1; $roundIndex <= NUMBER_OF_ROUNDS; $roundIndex++) {
        $roundData[] = generateQuestionAndAnswer(); // содержит вопрос, и правильный ответ
    }
    playRound($roundData, RULES_GAME); // отправляю всю логику в движок
}
