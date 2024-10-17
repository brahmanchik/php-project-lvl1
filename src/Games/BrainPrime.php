#!/usr/bin/env php
<?php

namespace BrainGames\Games\Prime;

/*
 * В игре показывается число и надо сказать простое оно или нет
 */
use function BrainGames\Engine\playRound;

use const BrainGames\Engine\NUMBER_OF_ROUNDS;

const MIN_VALUE = 1;
const MAX_VALUE = 31;
const RULES_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';
function isPrime(int $n): bool //проверка, является ли число простым?
{
    // Если число меньше или равно 1, оно не простое
    if ($n <= 1) {
        return false;
    }
    // 2 - единственное чётное простое число
    if ($n === 2) {
        return true;
    }
    // Если число чётное и больше 2, оно не простое
    if ($n % 2 === 0) {
        return false;
    }
    // Проверяем делители от 3 до sqrt(n), с шагом 2 (только нечётные числа)
    for ($i = 3; $i <= sqrt($n); $i += 2) {
        if ($n % $i === 0) {
            return false;
        }
    }
    // Если делители не найдены, число простое
    return true;
}
function generateQuestionAndAnswer(): array
{
    $randomNumber = rand(MIN_VALUE, MAX_VALUE);
    $correctAnswer = isPrime($randomNumber) ? 'yes' : 'no';
    return [(string) $randomNumber, $correctAnswer]; //$возвращаю массив из 2 элементов, число и ответ простое это число или нет
}
function playPrimeGame()
{
    $roundData = [];
    for ($roundIndex = 1; $roundIndex <= NUMBER_OF_ROUNDS; $roundIndex++) {
        $roundData[] = generateQuestionAndAnswer();
    }
    playRound($roundData, RULES_GAME); // отправляю всю логику в движок
}
