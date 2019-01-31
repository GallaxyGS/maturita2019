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
  $sql = $mysqli->prepare("SELECT * FROM authors");
  $sql->execute();
  $result = $sql->get_result();
  while ($authors = $result->fetch_assoc()) {
  ?> <a href="authordetail.php?idauthor=<?php echo $authors['id_author'];?>"><?php echo $authors['firstname'] . $authors['lastname'] ; ?> </a> <?php
  echo "<br>";
}




 ?> 

  </body>
</html>
