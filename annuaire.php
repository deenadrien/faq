<html>
    <head>
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <script
          src="https://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous"></script>

        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <meta charset="utf-8">

        <?php
          include_once "bdd.php";

          $getAllContacts = $pdo -> prepare("SELECT * FROM annuaire");
          $getAllContacts -> execute();
        ?>
    </head>
    <body>
      <?php
        include 'navigation.php';
      ?>
        <div class="container">
            <h1 class="text-center">Annuaire</h1>
            <center><a href="add_contact.php"><button type="button" class="btn btn-success">Ajouter un contact</button></a></center>
            <div class="col-md-12">
                <div class="form-group">
                    <input type="text" class="form-control" id="searchBox" placeholder="Rechercher...">
                </div>
            </div>
            <div id="contacts-list">
                <?php
                    while($row = $getAllContacts -> fetch(PDO::FETCH_ASSOC)){
                        echo '<div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">' . $row['prenom'] . ' ' . $row['nom'] . '</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">' . $row['societe'] . '</h6>
                                    <a href="contact.php?id=' . $row['id'] . '" class="card-link">Accéder à la fiche</a>
                                </div>
                            </div>';
                    }
                ?>
            </div>
        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#searchBox").keyup(function(){
                    value = $(this).val();
                    $.post("searchcontact.php",{value:value},function(data){
                        $("#contacts-list").html(data);
                    });
                    console.log(value);
                });
            });
        </script>
    </body>
</html>