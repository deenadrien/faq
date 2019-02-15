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

          $getAllTypes = $pdo -> prepare("SELECT * FROM type");
          $getAllTypes -> execute();

          $getAllCategories = $pdo -> prepare("SELECT * FROM category");
          $getAllCategories -> execute();
        ?>
    </head>
    <body>
        <?php
            include 'navigation.php';
        ?>
        <div class="container">
            <center><h1>Ajouter une question</h1></center>
            <form method="post" action="add_question_process.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Titre" required>
                </div>
                <div class="form-group">
                    <label for="typeSelect">Type</label>
                    <select class="form-control" id="typeSelect" name="type">
                        <option>Sélectionner</option>
                        <?php
                            while($row = $getAllTypes -> fetch(PDO::FETCH_ASSOC)){
                                echo '<option value="' . $row['title'] . '">' . $row['title'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group" id="linkGroup">
                    <label for="link">Lien</label>
                    <input type="text" class="form-control" id="link" name="link" placeholder="Lien">
                </div>
                <div class="form-group" id="fileGroup">
                    <label for="fileLink">Lien</label>
                    <input type="file" class="form-control-file" id="fileLink" name="file">
                </div>
                <div class="form-group">
                    <label for="categoriesSelect">Catégorie</label>
                    <select class="form-control" id="categoriesSelect" name="category">
                        <option>Sélectionner</option>
                        <?php
                            while($row = $getAllCategories -> fetch(PDO::FETCH_ASSOC)){
                                echo '<option value="' . $row['title'] . '">' . $row['title'] . '</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="subCategoriesSelect">Catégorie</label>
                    <select class="form-control" id="subCategoriesSelect" name="sub_category">
                        <option>Sélectionner</option>
                    </select>
                </div>
                <center><button type="submit" class="btn btn-info">Enregistrer</button></center>
            </form>
        </div>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#categoriesSelect").change(function(){
                    id = $(this).val();
                    $.post("subcat.php",{id:id},function(data){
                    $("#subCategoriesSelect").html(data);
                    });
                });

                $("#typeSelect").change(function(){

                    var pdf = "PDF";
                    var video = "Vidéo";
                    var url = "URL";

                    id = $(this).val();
                    if(id === pdf){
                        $("#linkGroup").css('display','none');
                        $("#fileGroup").css('display','block');
                    }else if(id === video){
                        $("#linkGroup").css('display','block');
                        $("#fileGroup").css('display','none');
                    }else if(id === url){
                        $("#linkGroup").css('display','block');
                        $("#fileGroup").css('display','none');
                    }
                });
            });
        </script>
    </body>
</html>