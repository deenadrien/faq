<?php

    include_once 'bdd.php';

    $insertContact = $pdo -> prepare("INSERT INTO annuaire(nom, prenom, societe, num_tel, description) VALUES (:nom, :prenom, :societe, :num_tel, :description)");
    $insertContact -> execute(array("nom" => $_POST['name'],
                                    "prenom" => $_POST['firstname'],
                                    "societe" => $_POST['factory'],
                                    "num_tel" => $_POST['phone'],
                                    "description" => $_POST['description']));

    header('Location: annuaire.php');

?>