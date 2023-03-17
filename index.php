<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"> <!--marche une fois sur deux-->
    <title>Hackers Poulette</title>
</head>
<body>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();
    $name = $firstname = $email = $comment = "";

    
    if(isset($_POST['submit']) && $_POST['submit'] == 'Submit') {
        //validate name
        if(empty($_POST['name'])) {
            $errors['name'] = "Please enter a name.";
        } else {
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
            if (!preg_match("/^[a-zA-Z-'\s]*$/", $name)) { //*? (length {2-255})
                $errors['name'] = "Only letters and white space allowed in this field.";
            }
        }
    

    //validate firstname
        if(empty($_POST['firstname'])) {
            $errors['firstname'] = "Please enter a name.";
        } else {
            $firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES);
            if (!preg_match("/^[a-zA-Z-'\s]*$/", $firstname)) {
                $errors['firstname'] = "Only letters and white space allowed in this field.";
            }
        }
    
    //validate email
        if (empty($_POST['email'])) {
            $errors['email'] = "Please enter an email address.";
        } else {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "This is not a valid email address.";
            }
        }
    

    //validate comment
        if (empty($_POST['comment'])) {
            $errors['comment'] = "Please enter your comment.";
        } else {
            $comment = htmlspecialchars($_POST['comment'], ENT_QUOTES);
            if (!preg_match('/^[a-zA-ZÁ-ù0-9]*$/', $comment)) { //any character, length {2-1000}
                $errors['comment'] = "A little longer, please"; 
            }
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


    if (count($errors) !== 0) {
        /*foreach ($errors as $error) {
            echo $error . "<br>";*/
            echo "Please correct the following errors"; //messes up the layout
            //find something unobtrusive like turning something red?
        } else {
        //empty form fields ($_POST = array() ?)
        //(or just hide the form altogether but stay on the page?
        //or move to a "thank you" page but only if there are no errors?)
        echo '<p>Thank you! We will get back to you as soon as possible</p>';
        //var_dump($errors);
    }
}
?>

    <header>
        <h1>Hackers Poulette</h1>
    </header>
    <div class="contactform">
    <h2>Contact support</h2>
    <form method="POST" action="">
        <br>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" minlength="2" maxlength="255" required>
        <?=@$errors['name'];?>
        <br>
        <label>First name</label>
        <input type="text" name="firstname" id="firstname" minlength="2" maxlength="255" required>
        <?=@$errors['firstname'];?>
        <br>
        <label for="firstname">Email</label>
        <input type="text" name="email" id="email" minlength="2" maxlength="255" required>
        <?=@$errors['email'];?>
        <br>
        <label for="comment">Comment</label>
        <input type="text" name="comment" id="comment" minlength="2" maxlength="1000" required>
        <?=@$errors['comment'];?>
        <br>
        <!--input type="text" name="honey"-->
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

<?php



    //PDO
/*try {
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
    VALUES (:name, :firstname, :email, :comments)");*/

    //liaison des valeurs
    //exécution de la requête





?>
</body>
</html>
