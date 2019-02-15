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

          $getAllCategories = $pdo -> prepare("SELECT * FROM category");
          $getAllCategories -> execute();

          $getAllPosts = $pdo -> prepare("SELECT * FROM post");
          $getAllPosts -> execute();
        ?>
    </head>
    <body>
      <div class="container" id="searchBox">
        <iframe src="https://giphy.com/embed/l0HlRnAWXxn0MhKLK" width="240" height="174" frameBorder="0"></iframe>
        <h1>Foire aux questions</h1>
        <div class="row">
          <div class="col-sm-6">
              <div class="form-group">
                <select class="form-control" id="categoriesSelect">
                  <option value="">Sélectionner</option>
                  <?php
                    while($row = $getAllCategories -> fetch(PDO::FETCH_ASSOC)){
                      echo '<option value="' . $row['title'] . '">' . $row['title'] . '</option>';
                    }
                  ?>
                </select>
              </div>
          </div>
          <div class="col-sm-6">
              <div class="form-group">
                <select class="form-control" id="subCategoriesSelect">
                  <option value="">Sélectionner</option>
                </select>
              </div>
          </div>
        </div>
        <div id="listOfLinks">
          
        </div>
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

          $("#subCategoriesSelect").change(function(){
            id = $(this).val();
            $.post("display_link.php",{id:id},function(data){
              $("#listOfLinks").html(data);
            });
          });
        });
      </script>
    </body>
</html>