<?php

echo "\n    ====    do... while    ====    \n";
$plant_height = 10;
//   change to >= 30 to see sequence

do {
    echo "The plant is $plant_height tall.\n";
    if ($plant_height >= 30) {
        echo "And can produce fruit.";
    }
    $plant_height += 1;
}
while ($plant_height <= 30);

echo "\n\n    ====    foreach    ====    \n";
$details_array = ["color" => "blue", "shape" => "square"];
foreach ($details_array as $key => $value) {
  echo "The " . $key . " is: " . $value . "\n";
}

