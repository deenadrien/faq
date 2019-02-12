<?php

    include_once "bdd.php";

    $updateContact = $pdo -> prepare("UPDATE annuaire SET prenom = :prenom, nom = :nom, societe = :societe, num_tel = :num_tel, description = :description WHERE id = :id");
    $updateContact -> execute(array("prenom"      => $_POST['firstname'],
                                    "nom"         => $_POST['name'],
                                    "societe"     => $_POST['factory'],
                                    "num_tel"     => $_POST['phone'],
                                    "description" => $_POST['description'],
                                    "id"          => $_GET['id']));

    header('Location: contact.php?id=' . $_GET['id']);

?>