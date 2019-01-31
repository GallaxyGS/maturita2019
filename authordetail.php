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
          $book = filter_input(INPUT_GET, "title");

          $sql = $mysqli->prepare("SELECT * FROM authors WHERE id_author = ?");
          $sql->bind_param("s" , $idauthor);
          $sql->execute();
          $author = $sql->get_result()->fetch_assoc();

          $sql = $mysqli->prepare("SELECT * FROM books b JOIN book_authors ba ON b.id_book = ba.id_book WHERE ba.id_author = ?");
          $sql->bind_param("s" , $idauthor);
          $sql->execute();
          $book = $sql->get_result();

       ?>
       <h1>Autor: <?php echo $author['firstname'] . $author['lastname']; ?> </h1>
       <h2>Napsal tyto knihy:<?php while ($book2 = $book->fetch_assoc()) {
       ?><a href="bookdetail.php?idbook= <?php echo $book2['id_book'];?>"><?php echo " "; echo $book2['title']; ?> </a> <?php
       echo "</br>";
     }




      ?></h2>
  </body>
</html>
