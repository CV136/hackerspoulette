<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="">
        <label>Contact support</label>
        <br>
        <label for="name">Name</label>
        <input type="text" name="name" minlength="2" maxlength="255" required>
        <br>
        <label>First name</label>
        <input type="text" name="firstname" minlength="2" maxlength="255" required>
        <br>
        <label for="firstname">Email</label>
        <input type="text" name="email" minlength="2" maxlength="255" required>
        <br>
        <label for="comment">Comment</label>
        <input type="text" name="comment" minlength="2" maxlength="1000" required>
        <br>
        <input type="submit">
    </form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();
    $name = $firstname = $email = $comment = "";

    //validate name
    if (isset ($_POST['submit']) && $_POST['submit'] == 'submit') {
        if (empty($_POST['name'])) {
            $errors['name'] = "Please enter a name.";
        } else {
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
                $errors['name'] = "Only letters and white space allowed in this field.";
            }
        }
    }

    //validate firstname
    if (isset ($_POST['submit']) && $_POST['submit'] == 'submit') {
        if (empty($_POST['firstname'])) {
            $errors['firstname'] = "Please enter a name.";
        } else {
            $name = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
            if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
                $errors['firstname'] = "Only letters and white space allowed in this field.";
            }
        }
    }

    //validate email
    if (isset($_POST['submit']) && $_POST['submit'] == 'submit') {
        if (empty($_POST['email'])) {
            $errors['email'] = "Please enter an email address.";
        } else {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            if (false === filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = "This is not a valid email address.";
            }
        }
    }

    //validate comment
    if (isset ($_POST['submit']) && $_POST['submit'] == 'submit') {
        if (empty($_POST['comment'])) {
            $errors['comment'] = "Please enter your comment.";
        } else {
            $name = filter_var($_POST['comment'], FILTER_SANITIZE_STRING);
            if (!preg_match("/^[a-zA-Z0-9 ]*$/", $firstname)) {
                $errors['comment'] = ""; //error message
            } //min and maximum length
        }
    }

    if (count($errors) === 0) {
        echo '<p class="text-xl italic mb-2 p-2">Thank you! We will get back to you as soon as possible</p>';

        
    } else {

        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        echo 'warning';
    }

}



?>
</body>
</html>
