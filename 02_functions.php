<?php

// Pass By Reference 
$string_one = "I like Jazz";
$string_two = "you are ugly";
$string_three = "Chelsea are the best";

// Write your code below:
function convertToQuestion(&$str)
{
    $str = "Do you think " . $str . "?\n";
}

convertToQuestion($string_one);
convertToQuestion($string_two);
convertToQuestion($string_three);

echo $string_one;
echo $string_two;
echo $string_three;


// use the global keyword to tell PHP to look in the global scope for the variable, instead of the local scope of the function
$language = "PHP";
$topic = "scope";

function generateLessonName($concept)
{
  global $language;
  return $language . ": " . $concept;
}

echo generateLessonName($topic);


