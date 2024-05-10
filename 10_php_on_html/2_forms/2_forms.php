<?php
/*
Since PHP was built with web development as a primary use case, it has functionality to ease processing of HTML
requests. When the front end client makes a request to a backend PHP server, several superglobals related to the request
are available to the PHP script. Superglobals are automatic global variables which are available in all scopes
throughout a script.

The list of superglobals in PHP includes the following:
    $GLOBALS,$_SERVER, $_GET, $_POST, $_FILES, $_COOKIE, $_SESSION, $_REQUEST, $_ENV

$_GET - this contains an associative array of variables passed to the current script using query parameters in the URL
$_POST - this contains an associative array of variables passed to the current script using a form submitted using the
“POST” method
$_REQUEST - this contains the contents of $_GET, $_POST, and $_COOKIE

Review:
    <?= is shorthand for <?php echo.
    PHP provides superglobals which can be accessed anywhere in the script.
        $_GET is an associative array containing data from a GET request.
        $_POST is an associative array containing data from a POST request.
        $_REQUEST is an associative array containing data from both GET and POST requests. It should only be used if you don’t care which method was used.
    The array keys in the PHP request superglobals are set by the name attributes in the HTML form, which need to be unique.
    The action attribute is used to specify which file should handle data from the form request.
*/
?>

<html>

<body>

    <h1>---- GET Form Handling ----</h1>
    <p>form entries are passed as parameters in a URL query string.</p>
    <form method="GET">
        Country:
        <input type="text" name="country">
        <br>
        Language:
        <input type="text" name="language">
        <br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <p>Your language is: <?= $_GET['language']; ?></p>
    <p>Your country is: <?= $_GET['country']; ?></p>
    <a href="index.php">Reset</a>


    <h1>---- POST Form Handling ----</h1>
    <p>form data is sent using the headers of the HTTP request</p>
    <form method="POST">
        Favourite Color:
        <input type="text" name="colour">
        <br>
        Favourite Food:
        <input type="text" name="food">
        <br>
        <input type="submit" value="Submit">
    </form>
    <br>
    <p>Best food is: <?= $_POST["food"]; ?></p>
    <p>Best color is: <?= $_POST["colour"]; ?></p>

    <a href="index.php">Reset</a>

    <h1>---- Action ----</h1>
    <p>action attribute specifies a relative URL. This URL will have access to superglobals as $_GET</p>
    <form method="get" action="greet_user.php">
        First Name:
        <input type="text" name="first">
        <br>
        Last Name:
        <input type="text" name="last">
        <br>
        <input type="submit" value="Submit">
    </form>

    <a href="index.php">Reset</a>

</body>

</html>