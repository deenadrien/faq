<?php

    include_once 'bdd.php';

    $delete_question = $pdo->prepare("DELETE FROM post WHERE id = :id");
    $delete_question -> execute(array("id" => $_GET['id']));

    header('Location: questions.php');

?>