<?php
include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . 'header.php' ;
 ?>
<!DOCTYPE html>
<html lang="cs" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
      <?php
          $idbook = filter_input(INPUT_GET, "id_book");
          $idauthor = filter_input(INPUT_GET, "id_author");
          ?>
       <div class="table-responsive">
         <table class="table table-striped table-sm">
           <thead>
             <tr>
               <th>Jméno</th>
               <th>Přijmení</th>
               <th>ID Knihy</th>
               <th>EAN</th>
               <th>Název knihy</th>
               <th>Počet stran</th>
               <th>Popis</th>
               <th>Rok vydání</th>
               <th>Vytvořeno</th>
             </tr>
           </thead>
           <tbody>
             <?php
                  $sql = $mysqli->prepare("SELECT *  FROM books
                                           JOIN book_authors USING (id_book)
                                           JOIN authors USING (id_author)
                                           ");
                  $sql->execute();
                  $result = $sql->get_result();
                  while ($books = $result->fetch_assoc()) {
                  ?>
                 <tr>
                  <td> <?php echo $books['firstname'];  ?> </td>
                  <td> <?php echo $books['lastname'];  ?> </td>
                  <td> <?php echo $books['id_book'];  ?> </td>
                  <td> <?php echo $books['ean'];  ?> </td>
                  <td> <?php  echo $books['title']; ?> </td>
                  <td> <?php echo $books['pages_count']; ?> </td>
                  <td> <?php echo $books['description']; ?> </td>
                  <td> <?php echo $books['year']; ?> </td>
                  <td> <?php echo $books['created_at']; ?> </td>

                  <td> <a href="../bookdetail.php?idbook=<?php echo $books['id_book']?>">Upravit</a> </td>
                 <?php

                }

                 ?> </tr>
             <tr>
               <td>1,015</td>
               <td>sodales</td>
               <td>ligula</td>
               <td>in</td>
               <td>libero</td>
             </tr>
           </tbody>
         </table>
       </div>
  </body>
</html>

<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR .  'footer.php' ?>
