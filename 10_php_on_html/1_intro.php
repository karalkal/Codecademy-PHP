<?php
$about_me = [
    "name" => "Ivan",
    "birth_year" => 1902,
    "favorite_food" => "pizza"
];

function calculateAge($person_arr)
{
    $current_year = date("Y");
    $age = $current_year - $person_arr["birth_year"];
    return $age;
}
?>

<h1>Welcome!</h1>
<h2>About me:</h2>

<?php
echo "<h3>Hello! I'm {$about_me["name"]}!</h3>";
echo "<p> I'm " . calculateAge($about_me) . " years old! </p>";
echo "<div>What more is there to say? I love {$about_me["favorite_food"]}, and that's pretty much it!</div>";
?>

<h1>ORIGINAL Only Shoes Shoe Shop</h1>
<?php
for ($i = 0; $i < 5; $i++) {
    ?>
    <p>We sell shoes</p>
    <?php
}
?>

<h1>#### endfor #### Only Shoes Shoe Shop</h1>
<?php
for ($i = 0; $i < 5; $i++):
    ?>
    <p>We sell shoes</p>
    <?php
endfor;
?>


<h1>#### endforeach and endwhile ####</h1>
<?php
$i = 0;
$repeats = [0, 1];
while ($i < 5):
    ?>
    <p>We sell shoes</p>
    <?php
    foreach ($repeats as $value):
        ?>
        <p>(only shoes)</p>
        <?php
    endforeach;
    ?>
    <?php
    $i++;
endwhile;
?>

<h1>#### echo shorthand opening tag ####</h1>
<h1>Shoe Shop</h1>
<?php
$footwear = [
    "sandals" => 4,
    "sneakers" => 7,
    "boots" => 3
];
?>
<p>Our footwear:</p>
<?php
foreach ($footwear as $type => $brands):
    ?>
    <p>We sell <?= $brands ?> brands of <?= $type ?></p>
    <?php
endforeach;
?>