<?php

    include_once 'bdd.php';

    $delete_category = $pdo->prepare("DELETE FROM category WHERE title = :title");
    $delete_category -> execute(array("title" => $_GET['title']));

    header('Location: categories.php');

?>