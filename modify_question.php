<html>
    <head>
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        
        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">

        <meta charset="utf-8">

        <?php
          include_once "bdd.php";
          include "navigation.php";

          $getQuestion = $pdo -> prepare("SELECT * FROM post WHERE id = :id");
          $getQuestion -> execute(array("id" => $_GET['id']));

          $getAllCategories = $pdo -> prepare("SELECT * FROM category");
          $getAllCategories -> execute();

          $row = $getQuestion -> fetch(PDO::FETCH_ASSOC);

        ?>
    </head>
    <body>
       <div class="container">
            <?php echo '<center><h1>Modifier la question #' . $row['id'] . '</h1></center>'; ?>
            <form action="modify_question_process.php" method="post">
                <?php echo '<input type="hidden" name="id" value="' . $row['id'] . '">'; ?>
                <div class="form-group">
                    <label for="title">Titre</label>
                    <?php echo '<input type="text" class="form-control" id="title" name="title" value="' . $row['title'] . '">'; ?>
                </div>
                <div class="form-group">
                    <label for="title">Lien</label>
                    <?php
                        if(strchr($row['link'],'http')){
                            echo '<input type="text" class="form-control" id="title" name="link" value="' . $row['link'] . '">';
                        }else{
                            echo '<input type="text" class="form-control" id="title" name="link" value="' . $row['link'] . '" readonly>';
                        }
                    ?>
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
                <center><button type="submit" class="btn btn-warning">Enregistrer la modification</button>&nbsp;&nbsp;<a href="questions.php"><button type="button" class="btn btn-danger">Annuler</button></a></center>
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
            });
        </script>
    </body>
</html>