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
    <header>
        <h1>Hackers Poulette</h1>
    </header>
    <div class="contactform">
    <h2>Contact support</h2>
    <form method="POST" action="validation.php">
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
        <input type="submit" name="submit">
    </form>
</div>

<?php

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





?>
</body>
</html>
