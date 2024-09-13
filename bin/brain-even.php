#!/usr/bin/env php
<?php



require_once(__DIR__ . '/../vendor/autoload.php'); // Подключение автозагрузки Composer
require_once(__DIR__ . '/../src/Cli.php');
require_once(__DIR__ . '/../src/evengame.php'); // Подключение файла с функцией playEvenGame()
use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\getName;
use function BrainGames\even\playEvenGame;


$name = getName();
playEvenGame($name);

