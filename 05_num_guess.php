<?php

$play_count = 0;
$correct_guesses = 0;
$guess_high = 0;
$guess_low = 0;

print "In this program, we'll see how often the player can guess a randomly generated number. 
After 10 rounds, we'll tell the player what percentage of the time they guessed correctly 
and whether they had a tendency to guess too high or too low. 
";

function guessNumber()
{
    global $play_count, $correct_guesses, $guess_high, $guess_low, $guess_low, $guess_high;
    $play_count++;

    $rand_number = rand(1, 10);
    $input = readline("Attempt no $play_count:\n ");
    $guess = (int)$input;           // note the syntax

    if ($guess === $rand_number) {
        $correct_guesses++;
    } elseif ($guess < $rand_number) {
        $guess_low++;
    } elseif ($guess > $rand_number) {
        $guess_high++;
    }
    echo "Number was: ", $rand_number, "\n", "Your guess was: ", $guess, "\n";
}

for ($i=0; $i < 10; $i++) { 
    guessNumber();
}

// escape the $ (not an investment advice)
echo "\n\$play_count: ", $play_count, "\n\$correct_guesses: ", $correct_guesses, "\n\$guess_high: ", $guess_high, "\n\$guess_low: ", $guess_low, "\n\n";


