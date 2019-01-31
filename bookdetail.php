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
          $idbook = filter_input(INPUT_GET, "idbook");

          $sql = $mysqli->prepare("SELECT * FROM books WHERE id_book = ?");
          $sql->bind_param("s" , $idbook);
          $sql->execute();
          $book = $sql->get_result()->fetch_assoc();
          var_dump($book);
       ?>
  </body>
</html>
