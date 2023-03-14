<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();
    $name = $firstname = $email = $comment = "";

    
    if (isset ($_POST['submit']) && $_POST['submit'] == 'submit') {
        //validate name
        if (empty($_POST['name'])) {
            $errors['name'] = "Please enter a name.";
        } else {
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $errors['name'] = "Only letters and white space allowed in this field.";
            }
        }
    

    //validate firstname
        if (empty($_POST['firstname'])) {
            $errors['firstname'] = "Please enter a name.";
        } else {
            $name = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
            if (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
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
}

//should only get rid of the form, not everything else
//errors still don't work