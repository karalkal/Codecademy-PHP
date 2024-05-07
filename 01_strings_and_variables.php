<?php
$noun = "stone";
$adjective = "strong";
$verb = "play";

echo "The world's most beloved $noun was very $adjective and loved to $verb every single day.";

echo "\nI have always been obsessed with ${noun}S. I'm ${adjective}ISH. I'm always ${verb}ING.";//deprecated
echo "\nI have always been obsessed with {$noun}S. I'm {$adjective}ISH. I'm always {$verb}ING.";

// concatenating assignment operator (.=)
echo "\n\n----------\n";
$sentence = "\nI'm going on a picnic, and I'm taking apples";

$sentence .= ", because I WANT TO";
$sentence .= ", c***s!";

echo $sentence;

// reference assignment operator (=&
echo "\n\n----------\n";
$very_bad_unclear_name = "15 chicken wings";
$order =& $very_bad_unclear_name;
$order .= "... and changed original string TOO";

echo "\nYour order is: $very_bad_unclear_name.";












