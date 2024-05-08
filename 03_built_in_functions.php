<?php

$first = "Welcome to the magical world of built-in functions.";
$second = 82137012983;

echo (gettype($first)), "\n", (gettype($second));
echo "\n\n";
var_dump($first);
var_dump($second);

echo "\nstrrev: ", strrev(".pu ti peeK .taerg gniod er'uoY\n");
echo "\nstrtolower: ", strtolower("\nSOON, tHiS WILL Look NoRmAL.");
echo "\nstr_repeat: ", str_repeat("\nThere's no place like home.", 3);
echo "\nsubstr_count: ", substr_count("AA jasdjAAjjkj jjaAA aa", "AA");
echo "\nround(no param): ", round(1298736.821763876);           // Prints: 1298737;
echo "\nround(2): ", round(1298736.821763876, 2);               // Prints: 1298737.82;
echo "\nabs: ", abs(-10.99);                                    // Prints: 10.99
echo "\nrand(noparam): ", rand();
echo "\nrand(-88, +88): ", rand(-88, 88);


echo "\nstrtoupper: ", strtoupper("abcd") . "!";
echo "\nceil: ", ceil(.88 * 1.2);
echo "\nfloor: ", floor(.88 * 1.2);
echo "\npi (area of circle example): ", pi() * (8) ** 2;

$fruit = "apples & bananas";
$fruit1 = str_replace("a", "OO", $fruit);
echo "\nstr_replace: ", $fruit1;

