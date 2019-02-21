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
          $idauthor = filter_input(INPUT_GET, "idauthor");

          $sql = $mysqli->prepare("SELECT * FROM books WHERE id_book = ?");
          $sql->bind_param("s" , $idbook);
          $sql->execute();
          $book = $sql->get_result()->fetch_assoc();

          $sql = $mysqli->prepare("SELECT * FROM authors WHERE id_author = ?");
          $sql->bind_param("s" , $idauthor);
          $sql->execute();
          $result = $sql->get_result();
          $author = $result->fetch_assoc();
       ?>
       <h1>Autor: <?php echo $author['firstname'] . $author['lastname']; ?> </h1>
       <h3>ID Knihy: <?php echo $book['id_book'] ?> </h3>
       <h3>EAN: <?php echo $book['ean'] ?> </h3>
       <h3>Název knihy: <?php echo $book['title'] ?> </h3>
       <h3>Počet stran: <?php echo $book['pages_count'] ?> </h3>
       <h3>Popis: <?php echo $book['description'] ?> </h3>
       <h3>Rok vydání: <?php echo $book['year'] ?> </h3>
       <h3>Vytvořeno: <?php echo $book['created_at'] ?> </h3>


  </body>
</html>
