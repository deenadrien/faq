<?php

    include_once 'bdd.php';

    $addCategory = $pdo -> prepare("INSERT INTO sub_category(title,category) VALUES (:title, :category)");
    $addCategory -> execute(array("title"    => $_POST['title'],
                                  "category" => $_POST['category']));

    header('Location: categories.php');

?>