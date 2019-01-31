<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . "db.php";

 ?>
<!DOCTYPE html>
<html lang="cs" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <?php
          $idauthor = filter_input(INPUT_GET, "idauthor");

          $sql = $mysqli->prepare("SELECT * FROM authors WHERE id_author = ?");
          $sql->bind_param("s" , $idauthor);
          $sql->execute();
          $author = $sql->get_result()->fetch_assoc();
          var_dump($author);
       ?>
  </body>
</html>
