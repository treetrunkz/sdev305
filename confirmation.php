<?php
/* confirmation.php
 * Gets data from pizza/index.html
 * 10/26/2020
 */

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS (Make sure Bootstrap is first) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css" >

    <title>Poppa's Pizza</title>

    <!-- favicon -->
    <link rel="icon" type="image/png" href="images/pizza.png">
</head>
<body>

<div class="container" id="main">

    <!-- Jumbotron header -->
    <div class="jumbotron">
        <h1 class="display-4">Welcome to Poppa's Pizza</h1>
        <p class="lead">Serving the Green River community since 1970!</p>
    </div>

    <h1>Thank you for your order!</h1>

    <h2>Order Summary</h2>

    <?php

        //Get data from POST array
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $address = $_POST['address'];
        $size = $_POST['size'];
        $toppings = implode(", ", $_POST['toppings']);
        $fromName = $fname . " " . $lname;
        $fromEmail = "tostrander@greenriver.edu";

        //Print order summary
        echo "<p>Name: $fname $lname</p>";
        echo "<p>Address: $address</p>";
        echo "<p>Size: $size</p>";
        echo "<p>Toppings: $toppings</p>";

        //Send email
        $to = "tostrander@greenriver.edu";
        $subject = "Pizza Order Placed";
        $message = "Order from $fname $lname\r\n";
        $message .= "Address: $address\r\n";
        $message .= "Toppings: $toppings";
        $headers = "Name: $fromName <$fromEmail>";

        $success = mail($to, $subject, $message, $headers);

        //Check success
        if ($success) {
            echo "<p>Your order has been placed.</p>";
        } else {
            echo "<p>Sorry... there was a problem.</p>";
        }

        //Shortcut
        echo $success ? "<p>Your order has been placed.</p>" :
             "<p>Sorry... there was a problem.</p>";
    ?>

    <pre>
    <?php
        //var_dump($_POST);
    ?>
    </pre>
</div>
</body>
</html>