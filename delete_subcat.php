<?php

    include_once 'bdd.php';

    $delete_sub_category = $pdo->prepare("DELETE FROM sub_category WHERE title = :title");
    $delete_sub_category -> execute(array("title" => $_GET['title']));

    header('Location: categories.php');

?>