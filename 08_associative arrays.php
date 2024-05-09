<?php

$php_array = array(
    "language" => "PHP",
    "creator" => "Rasmus Lerdorf",
    "year_created" => 1995,
    "filename_extensions" => [".php", ".phtml", ".php3", ".php4", ".php5", ".php7", ".phps", ".php-s", ".pht", ".phar"]
);

$php_short = [
    "language" => "PHP",
    "creator" => "Rasmus Lerdorf",
    "year_created" => 1995,
    "filename_extensions" => [".php", ".phtml", ".php3", ".php4"]
];

$php_array[0] = "Added";        // add element
print_r($php_array);
$php_array[0] = "Replaced";     // replace element
print_r($php_array);
unset($php_array[0]);           // remove element
print_r($php_array);

echo "\n===============\n";
echo implode("----", array_slice($php_short, 0, -1, false));
// cannot convert arr to str, hence slice - start index, end index, preserve (default false) indeces, true will reorder indeces starting from 0 (applies to ordered arrays)

echo "\n===============\n";
/*  When we add an element to an array without specifying a key (e.g. using array_push()), 
    PHP will associate it with the “next” integer key. If no integer keys have been used, 
    it will associate it with the key 0, otherwise it will associate it one more than the largest integer used thus far. */

$hybrid_array = ["cat", "dog", 9, 18.2];
$hybrid_array[8] = "five more";
print_r($hybrid_array);
array_push($hybrid_array, rand());
echo $hybrid_array[9];

echo "\n\n ==== identical indeces(treated as keys actually)==== \n";
/* Joining Arrays
Since the two arrays being joined have identical keys (0, 1, and 2), no values from the second array, $string_array, are included */
$number_array = [8, 3, 7];
$string_array = ["first element", "second element", "third element"];
$union_array = $number_array + $string_array;
print_r($union_array);

// identical keys
echo "\n ==== identical keys ==== \n";
$first = ["a" => "A", "b" => "B", "c" => "C"];
$second = ["a" => "XX", "b" => "B", "c" => "C"];
$combined = $first + $second;
print_r($combined);

// assign by Value or by Reference
echo "\n ==== assign by Value or by Reference ==== \n";
$favorites = ["food" => "pizza", "person" => "myself", "dog" => "Pesho"];
$copy = $favorites;
$alias =& $favorites;
$favorites["food"] = "NEW!";

echo "copy value to new independent entity (=) : ", $copy["food"], "\n";        // copy remains "pizza"
echo "assign as reference to original (=&) : ", $alias["food"], "\n";           // alias is "NEW!"
/*  First function doesn’t accept its array argument by reference. 
    Therefore, $arr is merely assigned a copy of the argument’s value. 
    This copy array is changed when the function is invoked, but that doesn’t affect the original argument array ($object). 
    To do that, we’d need to pass it by reference: */

function changeColor($arr)
{
    $arr["color"] = "red";
    echo "\nin function: ", $arr["color"];
}
$object = ["shape" => "square", "size" => "small", "color" => "green"];
changeColor($object);
echo "\noutside function: ", $object["color"];      // Prints: green

function reallyChangeColor(&$arr)
{
    $arr["color"] = "red";
}
$object = ["shape" => "square", "size" => "small", "color" => "green"];
reallyChangeColor($object);
echo "\nchanged by reference (as param is made to refer to the arg... I would say): ", $object["color"];      // Prints: red
