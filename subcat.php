<?php
    include_once "bdd.php";

    $getSubCat = $pdo -> prepare("SELECT * FROM sub_category where category = :cat");
    $getSubCat -> execute(array("cat" => $_POST['id']));

    echo '<option value="">Sélectionner</option>';
    while($row = $getSubCat -> fetch(PDO::FETCH_ASSOC)){
        echo '<option value="' . $row['title'] . '">' . $row['title'] . '</option>';
    }

?>