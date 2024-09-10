<?php

require_once(__DIR__ . '/../vendor/autoload.php'); // Подключение автозагрузки Composer
require_once(__DIR__ . '/../src/Cli.php');
use function BrainGames\Cli\getName;

getName();
