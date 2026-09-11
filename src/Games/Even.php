<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\getNameUser;
use function cli\line;
use function cli\prompt;

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function run(): void
{
    $name = getNameUser();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $countCorrectAnswers  = 0;

    while ($countCorrectAnswers  < 3) {
        $number = rand(1, 100);
        $correctAnswer  = isEven($number) ? 'yes' : 'no';

        line("Question: {$number}");
        $answer = prompt('Your answer');

        if ($answer === $correctAnswer) {
            line('Correct!');
            $countCorrectAnswers++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        }
    }
    line("Congratulations, {$name}!");
}
