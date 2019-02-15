<?php

    include_once 'bdd.php';

    try{
        // mode d'erreurs
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
 
        // Indispensable pour ne pas avoir execute qui formate en string avec un tableau en paramètre  (incompatible avec la clause limit)
		$pdo_options[PDO::ATTR_EMULATE_PREPARES] = false;

        $delete_category = $pdo->prepare("DELETE FROM category WHERE title = :title");
        $delete_category -> execute(array("title" => $_GET['title']));

        header('Location: categories.php');
    }catch(Exception $e){
        header('Location: categories.php?error=1');
    }
    
?>