<?php

    include_once 'bdd.php';

    $addCategory = $pdo -> prepare("INSERT INTO category(title) VALUES (:title)");
    $addCategory -> execute(array("title" => $_POST['title']));

    header('Location: categories.php');

?>