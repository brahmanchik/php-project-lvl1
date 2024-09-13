<?php

/**
 * Этот файл содержит функции для работы с Brain Games.
 *
 * @category    CLI
 * @package     BrainGames
 * @author      brahmanchik <brahmanchik@gmail.com>
 * @license     MIT License <https://opensource.org/licenses/MIT>
 * @version     GIT: <2.45>
 * @link        https://example.com
 * @php_version 8.3.11
 */

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Функция выводит приветствие и запрашивает имя пользователя.
 *
 * @return void
 */
function getName()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
