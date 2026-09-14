<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\getNameUser;
use function cli\line;
use function cli\prompt;

function calculate()
{
    $name = getNameUser();
    $countCorrectAnswers  = 0;

    line("What is the result of the expression?");

    while ($countCorrectAnswers < 3) {
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);

        $operators = ['+', '-', '*'];
        $operator = $operators[array_rand($operators)];

        switch ($operator) {
            case '-':
                $correctAnswer = $firstNumber - $secondNumber;
                break;
            case '+':
                $correctAnswer = $firstNumber + $secondNumber;
                break;
            case '*':
                $correctAnswer = $firstNumber * $secondNumber;
                break;
        }

        line("Question: {$firstNumber} {$operator} {$secondNumber}");
        $answer = prompt("Your answer");

        if ($correctAnswer === (int)$answer) {
            line('Correct!');
            $countCorrectAnswers++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, {$name}!");
            return;
        };
    }
    line("Congratulations, {$name}!");
}
