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
  $sql = $mysqli->prepare("SELECT id_book, title, ean FROM books");
  $sql->execute();
  $result = $sql->get_result();
  while ($books = $result->fetch_assoc()) {
  ?> <a href="bookdetail.php?idbook=<?php echo $books['id_book'];?>"><?php echo $books['title']; ?> </a> <?php
  echo "<br>";
}




 ?>


  </body>
</html>
