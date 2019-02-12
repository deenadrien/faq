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

          $getContact = $pdo -> prepare("SELECT * FROM annuaire WHERE id = :id");
          $getContact -> execute(array("id" => $_GET['id']));

          $row = $getContact -> fetch(PDO::FETCH_ASSOC)
        ?>
    </head>
    <body>
        <?php
            include 'navigation.php';
            $test = str_replace('\r\n','<br>',$row['description']);
        ?>

        <div class="container">
            <center><img src="img/book.png" id="book"></center>
            <?php echo '<h1>' . $row['prenom'] . ' ' . $row['nom'] . '</h1>'; ?>
            <?php echo '<h4>' . $row['societe'] . '</h4>'; ?>

            <?php echo '<center><a href="modify_contact.php?id=' . $row['id'] . '"><button type="button" class="btn btn-info">Modifier la fiche contact</button></a></center>'; ?>
            <br><br><br>
            <center>
                <img src="img/phone.png">
                <?php echo 'Numéro de téléphone: <br><b>' . $row['num_tel'] . '</b>'; ?>
                <br><br>
                <img src="img/profile.png">
                <?php echo 'Description: <br><b>' . $test . '</b>'; ?>
            </center>
        </div>
    </body>
</html>