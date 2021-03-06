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

          $getAllPosts = $pdo -> prepare("SELECT * FROM post");
          $getAllPosts -> execute();
        ?>
    </head>
    <body>
      <?php
        include 'navigation.php';
      ?>
      <div class="container">
        <h1 class="text-center">Gérer les questions</h1>
        <center><a href="add_question.php"><button class="btn btn-success" id="addQuestionButton">Ajouter une question</button></a></center>
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Titre</th>
              <th scope="col">Lien</th>
              <th scope="col">Type</th>
              <th scope="col">Catégorie</th>
              <th scope="col">Sous-catégorie</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($row = $getAllPosts -> fetch(PDO::FETCH_ASSOC)){
                echo '<tr>';
                  echo '<td>' . $row['id'] . '</td>';
                  echo '<td>' . $row['title'] . '</td>';
                  echo '<td>' . $row['link'] . '</td>';
                  echo '<td>' . $row['type'] . '</td>';
                  echo '<td>' . $row['category'] . '</td>';
                  echo '<td>' . $row['sub_category'] . '</td>';
                  echo '<td><a href="modify_question.php?id=' . $row['id'] . '"><img src="img/edit.png"></a>&nbsp;&nbsp;&nbsp;<a href="delete.php?id=' . $row['id'] . '"><img src="img/close.png"></a></td>';
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
      </div>
      
    </body>
</html>