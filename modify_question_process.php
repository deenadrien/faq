<?php

    include_once "bdd.php";

    $updateQuestion = $pdo -> prepare("UPDATE post SET title = :title, link = :link, category = :category, sub_category = :sub_category WHERE id = :id");
    $updateQuestion -> execute(array("title"       => $_POST['title'],
                                    "link"         => $_POST['link'],
                                    "category"     => $_POST['category'],
                                    "sub_category" => $_POST['sub_category'],
                                    "id"           => $_POST['id']));

    header('Location: questions.php');

?>