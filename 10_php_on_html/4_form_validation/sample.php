<!-- 
    1. Add PHP code to check the validity of a user’s input if the form has been submitted.
    2. Add an HTML element to display an error message to the user if their submission is not valid.
    3. Fill each field in the form with the user’s previously submitted input 
-->


<h1>*******htmlspecialchars()*******</h1>
<?php
function checkWord($input, $target_letter)
{
    if ($_SERVER["REQUEST_METHOD"] === "POST" and $input[0] !== $target_letter) {
        return "* This word must start with the letter $target_letter!";
    }
    return "";
}
?>

<h1>Time to Practice our ABCs</h1>
<form method="post" action="">
    Enter a word that starts with the letter "a":
    <br>
    <input type="text" name="a-word" id="a-word" value=<?= $_POST["a-word"]; ?>>
    <br>
    <p class="error" id="a-error"><?= checkWord($_POST["a-word"], "a"); ?></p>
    <br>
    Enter a word that starts with the letter "b":
    <br>
    <input type="text" id="b-word" name="b-word" value=<?= $_POST["b-word"]; ?>>
    <br>
    <p class="error" id="b-error"><?= checkWord($_POST["b-word"], "b"); ?></p>
    <br>
    Enter a word that starts with the letter "c":
    <br>
    <input type="text" id="c-word" name="c-word" value=<?= $_POST["c-word"]; ?>>
    <br>
    <p class="error" id="c-error"><?= checkWord($_POST["c-word"], "c"); ?></p>
    <br>
    <input type="submit" value="Submit Words">
</form>
<div>
    <h3>"a" is for: <?= $_POST["a-word"]; ?> </h3>
    <h3>"b" is for: <?= $_POST["b-word"]; ?> </h3>
    <h3>"c" is for: <?= $_POST["c-word"]; ?> </h3>
</div>


<h1>*******htmlspecialchars()*******</h1>
<form method="post" action="">
    Enter some HTML:
    <br>
    <input type="text" name="html">
    <br>
    <input type="submit" value="Submit">
</form>
<div>
    You entered:
    <?= htmlspecialchars($_POST["html"]) ?>
</div>

<h1>*******Basic Sanitization with filter_var()*******</h1>
<?php
$validation_error = "";
$user_answer = "";
$submission_response = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_answer = filter_var($_POST["answer"], FILTER_SANITIZE_NUMBER_INT);
    if ($user_answer != "-5") {
        $validation_error = "* Wrong answer. Try again.";
    } else {
        $submission_response = "Correct!";
    }
}
?>

<h2>Time for a math quiz!</h2>
<form method="post" action="">
    <h4>Question 1:</h4>
    <p>What is 6 - 11?</p>
    <input type="text" name="answer" id="answer" value="<?= $user_answer; ?>">
    <br>
    <span class="error" id="error"><?= $validation_error; ?></span>
    <br>
    <input type="submit" value="Submit Your Answer">
</form>
<div>
    <p id="answer-display">Your answer was: <?= $user_answer; ?></p>
    <p id="submission-response"><?= $submission_response; ?></p>
</div>


<h1>*******Basic Validation with filter_var()*******</h1>
<?php
$validation_error = "";
$user_url = "";
$form_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_url = $_POST["url"];
    if (!filter_var($user_url, FILTER_VALIDATE_URL)) {
        $validation_error = "* This is an invalid URL.";
        $form_message = "Please retry and submit your form again.";
    } else {
        $form_message = "Thank you for your submission.";
    }
}
?>

<form method="post" action="">
    Your Favorite Website:
    <br>
    <input type="text" name="url" value="<?php echo $user_url; ?>">
    <span class="error"><?= $validation_error; ?></span>
    <br>
    <input type="submit" value="Submit">
</form>
<p> <?= $form_message; ?> </p>


<h1>*******Basic Validation with filter_var()*******</h1>
<?php
$message = "";
$month_error = "";
$day_error = "";
$year_error = "";

$month_options = ["options" => ["min_range" => 1, "max_range" => 12]];
$day_options = ["options" => ["min_range" => 1, "max_range" => 31]];
$year_options = ["options" => ["min_range" => 1903, "max_range" => date("Y")]];

function validateInput($type, &$error, $options_arr)
{
    if (!filter_var($_POST[$type], FILTER_VALIDATE_INT, $options_arr)) {
        $error = "* Invalid ${type}";
        return FALSE;
    } else {
        return TRUE;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $test_month = validateInput("month", $month_error, $month_options);
    $test_day = validateInput("day", $day_error, $day_options);
    $test_year = validateInput("year", $year_error, $year_options);
    if ($test_month && $test_day && $test_year) {
        $message = "Your birthday is: {$_POST["month"]}/{$_POST["day"]}/{$_POST["year"]}";
    }
}
?>

<form method="post" action="">
    Enter your birthday:
    <br>
    Month: <input type="number" name="month" value="<?= $_POST["month"]; ?>">
    <span class="error"><?= $month_error; ?> </span>
    <br>
    Day: <input type="number" name="day" value="<?= $_POST["day"]; ?>">
    <span class="error"><?= $day_error; ?> </span>
    <br>
    Year: <input type="number" name="year" value="<?= $_POST["year"]; ?>">
    <span class="error"><?= $year_error; ?> </span>
    <br>
    <input type="submit" value="Submit">
</form>
<p><?= $message; ?></p>


<h1>*******preg_match(), strlen()*******</h1>
<?php
$feedback = "";
$success_message = "Thank you for your donation!";
$error_message = "* There was an error with your card. Please try again.";

$card_type = "";
$card_num = "";
$donation_amount = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $card_type = $_POST["credit"];
    $card_num = $_POST["card-num"];
    $donation_amount = $_POST["amount"];

    if (strlen($card_num) < 100) {
        if ($card_type === "mastercard") {
            if (preg_match("/5[1-5][0-9]{14}/", $card_num) === 1) {
                $feedback = $success_message;
            } else {
                $feedback = $error_message;
            }
        } else if ($card_type === "visa") {
            if (preg_match("/4[0-9]{12}([0-9]{3})?([0-9]{3})?/", $card_num) === 1) {
                $feedback = $success_message;
            } else {
                $feedback = $error_message;
            }
        }
    } else {
        $feedback = $error_message;
    }
}
?>
<form action="" method="POST">
    <h1>Make a donation</h1>
    <label for="amount">Donation amount?</label>
    <input type="number" name="amount" value="<?= $donation_amount; ?>">
    <br><br>
    <label for="credit">Credit card type?</label>
    <select name="credit" value="<?= $card_type; ?>">
        <option value="mastercard">Mastercard</option>
        <option value="visa">Visa</option>
    </select>
    <br><br>
    <label for="card-num">Card number?</label>
    <input type="number" name="card-num" value="<?= $card_num; ?>">
    <br><br>
    <input type="submit" value="Submit">
</form>
<span class="feedback"><?= $feedback; ?></span>


<h1>*******Validating Against Back-end Data and redirection*******</h1>
<?php
$users = ["coolBro123" => "password123!", "coderKid" => "pa55w0rd*", "dogWalker" => "ais1eofdog$"];
$feedback = "";
$message = "You're logged in!";
$validation_error = "* Incorrect username or password.";
$username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (isset($users[$username]) && $users[$username] === $password) {
        $feedback = $message;
        header("Location: success.html");
        exit;

    } else {
        $feedback = $validation_error;
    }
}
; ?>

<h3>Welcome back!</h3>
<form method="post" action="">
    Username:<input type="text" name="username" value="<?php echo $username; ?>"> <!-- think value is not needed? -->
    <br>
    Password:<input type="text" name="password" value="">
    <br>
    <input type="submit" value="Log in">
</form>
<span class="feedback"><?= $feedback; ?></span>


<h1>*******sanitize data formatting with preg_replace(), e.g. to change phone numbers to the same format.*******
</h1>
<?php
$contacts = ["Susan" => "5551236666", "Alex" => "7779991717", "Lily" => "8181117777"];
$message = "";
$validation_error = "* Please enter a 10-digit North American phone number.";
$name = "";
$number = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $number = $_POST["number"];
    if (strlen($number) < 30) {
        $formatted_number = preg_replace("/[^0-9]/", "", $number);      // remove any character that is NOT the numbers 0 to 9
        if (strlen($formatted_number) === 10) {
            $contacts[$name] = $formatted_number;
            $message = "Thanks ${name}, we'll be in touch.";
        } else {
            $message = $validation_error;
        }
    } else {
        $message = $validation_error;
    }
}
;
?>
<html>

<body>
    <h3>Contact Form:</h3>
    <form method="post" action="">
        Name:
        <br>
        <input type="text" name="name" value="<?= $name; ?>">
        <br><br>
        Phone Number:
        <br>
        <input type="text" name="number" value="<?= $number; ?>">
        <br><br>
        <input type="submit" value="Submit">
    </form>
    <div id="form-output">
        <p id="response"><?= $message ?></p>
    </div>
</body>

</html>