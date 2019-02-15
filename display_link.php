<?php

    include_once "bdd.php";

    

    $getLinks = $pdo -> prepare("SELECT * FROM post WHERE sub_category = :sub");
    $getLinks -> execute(array("sub" => $_POST['id']));

    $count = $getLinks->rowCount();

    if($count == 0){
        echo '<center><img src="img/empty.png"></center><br>';
        echo '<center><h3>Aucune documentation trouvée</h3></center>';
    }else{
        while($row = $getLinks -> fetch(PDO::FETCH_ASSOC)){
            if($row['type'] === 'PDF'){
              echo '<img src="img/pdf.png"><a href="' . $row['link'] . '" target="_blank">' . $row['title'] . '</a><br><br>';
            }else if($row['type'] === 'Vidéo'){
              echo '<img src="img/video.png"><a href="' . $row['link'] . '" target="_blank">' . $row['title'] . '</a><br><br>';
            }else if($row['type'] === 'URL'){
                echo '<img src="img/www.png"><a href="' . $row['link'] . '" target="_blank">' . $row['title'] . '</a><br><br>';
            }else{
                echo '<a href="' . $row['link'] . '" target="_blank">' . $row['title'] . '</a><br><br>';
              }
        }
    }
    
    


?>