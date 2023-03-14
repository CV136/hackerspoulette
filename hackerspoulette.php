<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!--doesn't work?-->
    <title>Hackers Poulette</title>
</head>
<body>
    <div class="contactform">
    <h2>Contact support</h2>
    <form method="POST" action=""> <!--script for action-->
        <br>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" minlength="2" maxlength="255" required>
        <br>
        <label>First name</label>
        <input type="text" name="firstname" id="firstname" minlength="2" maxlength="255" required>
        <br>
        <label for="firstname">Email</label>
        <input type="text" name="email" id="email" minlength="2" maxlength="255" required>
        <br>
        <label for="comment">Comment</label>
        <input type="text" name="comment" id="comment" minlength="2" maxlength="1000" required>
        <br>
        <!--input type="text" name="honey"-->
        <input type="submit">
    </form>
</div>

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
            } //min and maximum length, type of characters
        }
    }

    //check honeypot
    /*if (isset ($_POST['submit']) && $_POST['submit'] == 'submit') {
        if (empty($_POST['honey'])) {
            //validate form 
        } else {
            //stop form processing? it's not like the bot is going to read the error message
        }
    }*/
    //captcha : requires a website, so to do after deployment?

    //^ validate all that with the linked validator instead?    


    if (count($errors) === 0) {
        echo '<p>Thank you! We will get back to you as soon as possible</p>';

        
    } else {

        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }

    //PDO
try {
    $strConnection = 'mysql:host=localhost;dbname=hackerspoulette'; //Ligne 1
    $arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $pdo = new PDO($strConnection, 'root', '', $arrExtraParam); // Instancie la connexion
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ligne 4
}
catch(PDOException $e) {
    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    die($msg);
} //?
    
    $query = $pdo->prepare("INSERT INTO contactform (name, firstname, email, comments) 
    VALUES (:name, :firstname, :email, :comments)");

    //liaison des valeurs
    //exécution de la requête

}



?>
</body>
</html>
