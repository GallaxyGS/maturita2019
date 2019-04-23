<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . 'header.php' ; ?>

<!DOCTYPE html>
<html lang="cs" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
<div class="table-responsive">
        <table class="table table-striped table-sm">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Jméno Autora</th>
                    <th>Přijmení Autora</th>
                    <th>Upravit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = $mysqli->prepare("SELECT * FROM authors");
                  $sql->execute();
                  $result = $sql->get_result();
                         while ($authors = $result->fetch_assoc()) {
                       ?>
                      <tr>
                       <td> <?php echo $authors['id_author'];  ?> </td>
                       <td> <?php echo $authors['firstname'];  ?> </td>
                       <td> <?php echo $authors['lastname'];  ?> </td>
                       <td> <a href="editauthor.php?id_author=<?php echo $authors['id_author']?>">Upravit</a> </td>
                      <?php

                     }

                      ?> </tr>
                </tbody>
              </table>
            </div>










                </table>
  </body>
</html>



<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR .  'footer.php' ?></body>
