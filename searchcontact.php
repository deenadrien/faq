<?php

    include_once "bdd.php";

    $getContacts = $pdo -> prepare("SELECT * FROM annuaire WHERE prenom LIKE :val OR nom LIKE :val OR num_tel LIKE :val OR societe LIKE :val OR description LIKE :val");
    $getContacts -> execute(array(':val' => '%' . $_POST['value'] . '%'));

    $count = $getContacts->rowCount();

    if($count == 0){
        echo '<center><img src="img/empty.png"></center><br>';
        echo '<center><h3>Aucun contact trouvé</h3></center>';
    }else{
        while($row = $getContacts -> fetch(PDO::FETCH_ASSOC)){
            echo '<div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">' . $row['prenom'] . ' ' . $row['nom'] . '</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">' . $row['societe'] . '</h6>
                                    <a href="contact.php?id=' . $row['id'] . '" class="card-link">Accéder à la fiche</a>
                                </div>
                            </div>';
        }
    }
    
    


?>