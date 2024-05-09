<?php

echo "\n  ++++  print_r and implode  ++++  \n";

$number_array = [0, 1, 2];
echo $number_array;     // Prints: Array
echo "\n";
print_r($number_array);

echo "\n";
$message = ["Oh hey", " You're doing great", " Keep up the good work!\n"];
echo implode("!", $message);

echo "\n  ++++  add elements to the end with square brackets without index, replace with  ++++  \n";
// add elements to the end with square brackets without index
// replace - with index
$change_me = [3, 6, 9];
$change_me[] = "OPPA";  //append
$change_me[] = 88;
$change_me[1] = "Replaced!";   //replace
print_r($change_me);

echo "\n  ++++  array_pop(), array_push(), array_shift(), array_unshift(), push and unshift return new count  ++++  \n";
// array_pop() - same as other languages
// array_push() function takes an array as its first argument. The arguments that follow are elements to be added to the end of the array. RETURNS count
$stack = [1, 2, 3];
array_push($stack, "AA", "BB");
print_r($stack);
echo "\n";
$first_popped = array_pop($stack);
echo "\$first_popped: ", $first_popped, "\n";
array_pop($stack);
array_pop($stack);
array_pop($stack);
print_r($stack);

// array_shift() - removes the first element of an array and returns that value
// array_unshift() takes an array as its first argument. The arguments that follow are elements to be added to the beginning of the array. RETURNS count
$record_holders = [];
array_unshift($record_holders, "Tim Montgomery", "Maurice Greene", "Donovan Bailey", "Leroy Burrell", "Carl Lewis");
echo implode(", ", $record_holders) . "\n";
$shifted_guy = array_shift($record_holders);
echo "\$shifted_guy: ", $shifted_guy, "\n";
echo implode(", ", $record_holders) . "\n\n";
