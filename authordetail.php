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
          $result = $sql->get_result();
          $author = $result->fetch_assoc();

          $sql2 = $mysqli->prepare("SELECT * FROM books b JOIN book_authors ba ON b.id_book = ba.id_book WHERE ba.id_author = ?");
          $sql2->bind_param("s" , $idauthor);
          $sql2->execute();
          $result2 = $sql2->get_result();

       ?>
       <h1>Autor: <?php echo $author['firstname'] . $author['lastname']; ?> </h1>
       <h2>Napsal tyto knihy:<?php while ($book = $result2->fetch_assoc()) {
       ?><a href="bookdetail.php?idbook= <?php echo $book['id_book'];?>"><?php echo " "; echo $book['title']; ?> </a> <?php
       echo "</br>";
     }




      ?></h2>
  </body>
</html>
