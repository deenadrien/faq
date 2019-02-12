<?php
    include_once "bdd.php";

    if($_FILES['file']['name'] != ""){
        $link = 'content/' . $_FILES['file']['name'];

        $temp_name = $_FILES['file']['tmp_name'];
        $chemin = 'content/' . $_FILES['file']['name'];

        move_uploaded_file($temp_name,$chemin);
    }else{
        $link = $_POST['link'];
    }

    $add_question = $pdo -> prepare("INSERT INTO post(title,link,type,category,sub_category) VALUES (:title, :link, :type, :category, :sub_category)");
    $add_question -> execute(array("title"        => $_POST['title'],
                                   "link"         => $link,
                                   "type"         => $_POST['type'],
                                   "category"     => $_POST['category'],
                                   "sub_category" => $_POST['sub_category']));
    
    header('Location: questions.php');
    
?>