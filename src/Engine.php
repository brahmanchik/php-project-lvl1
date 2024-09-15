<?php

namespace BrainGames\engine;
use function cli\line;
use function cli\prompt;

function getName($nameGame)
{
    line("Welcome to the %s!", $nameGame);
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    return $name;
}