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
                    <th>Jméno žánru</th>
                    <th>Upravit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = $mysqli->prepare("SELECT * FROM genres");
                  $sql->execute();
                  $result = $sql->get_result();
                         while ($genres = $result->fetch_assoc()) {
                       ?>
                      <tr>
                      <td> <?php echo $genres['id_genre'];  ?> </td>
                       <td> <?php echo $genres['name'];  ?> </td>
                       <td> <a href="editgenre.php?id_genre=<?php echo $genres['id_genre']?>">Upravit</a> </td>
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
