<?php


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=hackerspoulette;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
} //as a basis
