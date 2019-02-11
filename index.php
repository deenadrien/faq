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

          $getAllCategories = $pdo -> prepare("SELECT * FROM category");
          $getAllCategories -> execute();

          $getAllPosts = $pdo -> prepare("SELECT * FROM post");
          $getAllPosts -> execute();
        ?>
    </head>
    <body>
      <div class="container" id="searchBox">
        <div class="row">
          <div class="col-sm-6">
              <div class="form-group">
                <select class="form-control" id="categoriesSelect">
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
                </select>
              </div>
          </div>
        </div>
        <?php
          while($row = $getAllPosts -> fetch(PDO::FETCH_ASSOC)){
            if($row['type'] === 'PDF'){
              echo '<img src="img/pdf.png"><a href="' . $row['link'] . '" target="_blank">' . $row['title'] . '</a>';
            }else{
              echo '<a href="' . $row['link'] . '">' . $row['title'] . '</a>';
            }
          }
        ?>
      </div>

      <script>
        $(document).ready(function(){
          $('#categoriesSelect').on('change',function(){
              var categorieValue = $(this).val();
              if(categorieValue){
                  $.ajax({
                      type:'POST',
                      url:'ajaxData.php',
                      data:'categorie_id='+categorieValue,
                      success:function(html){
                          $('#subCategoriesSelect').html(html);
                      }
                  }); 
              }else{
                  $('#subCategoriesSelect').html('<option value="">Selectionner une catégorie</option>');
              }
          });
      </script>
    </body>
</html>