<?php

/**
 * Этот файл (движок) содержит функции для работы с Brain Games.
 * Этапы работы движка:
 * 1. Приветствие и запрос имени
 * 2. Далее задается какой-то вопрос
 * 3. Вычисляется правильный ответ на вопрос
 * 4. Ожидается ответ от пользователя
 * 5. Сравнивается ответ пользователя с заранее вычисленным правильным ответом
 * 6. Вывод сообщения, верный ответ или нет
 * 7. Если ответ верный мы задаем новый вопрос снова в цикле, если нет - завершаем работу скрипта
 *
 * @category    CLI
 * @package     BrainGames
 * @author      brahmanchik <brahmanchik@gmail.com>
 * @license     MIT License <https://opensource.org/licenses/MIT>
 * @version     GIT: <2.45>
 * @link        https://example.com
 * @php_version 8.3.11
 */

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const NUMBER_OF_ROUNDS = 3;
//функция приветствия и начала игры
function greeting(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    return $name;
}
function askQuestion(string $question): string//функция запроса ответа на вопрос
{
    line('Question: %s', $question);
    $answer = prompt('Your answer');
    return $answer;
}
// ниже главная функция движка
function playRound(array $roundData, string $rulesGame): void
{
    $name = greeting();
    line($rulesGame); // Выводим правила один раз перед началом игры
    foreach ($roundData as [$question, $correctAnswer]) {
        $answer = askQuestion($question);
        // Сравниваем ответ пользователя с правильным ответом
        if ($answer !== $correctAnswer) {
            line(
                "'%s' is wrong answer ;(. Correct answer was '%s'. \nLet's try again, %s!",
                $answer,
                $correctAnswer,
                $name
            );
            return;
        } else {
            line('Correct!');
        }
    }
    line('Congratulations, %s!', $name); // вывод, если выиграл все раунды
}
