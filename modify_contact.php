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
            <?php echo '<h1>Modifier ' . $row['prenom'] . ' ' . $row['nom'] . '</h1>'; ?>
            <hr>
            <?php echo '<form action="modify_contact_process.php?id=' . $_GET['id'] . '" method="post">'; ?>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <?php echo '<input type="text" class="form-control" name="name" id="name" value="' . $row['nom'] . '">'; ?>
                        </div>    
                    </div>
                    <div class="col-md-5 offset-md-1">
                        <div class="form-group">
                            <label for="firstname">Prénom</label>
                            <?php echo '<input type="text" class="form-control" name="firstname" id="firstname" value="' . $row['prenom'] . '">'; ?>
                        </div>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="factory">Société</label>
                            <?php echo '<input type="text" class="form-control" name="factory" id="factory" value="' . $row['societe'] . '">'; ?>
                        </div>    
                    </div>
                    <div class="col-md-5 offset-md-1">
                        <div class="form-group">
                            <label for="phone">Numéro de téléphone</label>
                            <?php echo '<input type="text" class="form-control" name="phone" id="phone" value="' . $row['num_tel'] . '">'; ?>
                        </div>    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <?php echo '<textarea class="form-control" name="description" id="description" rows="12">' . $row['description'] . '</textarea>'; ?>
                        </div>    
                    </div>
                </div>
                <center>
                    <button type="submit" class="btn btn-warning">Enregistrer la modification</button>
                    <a href="annuaire.php"><button type="button" class="btn btn-danger">Annuler</button></a>
                </center>
            </form>
        </div>
    </body>
</html>