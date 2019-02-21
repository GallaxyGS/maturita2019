<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . 'header.php' ;
?>


      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

      <h2>Section title</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Název knížky</th>
              <th>EAN</th>
              <th>Jméno</th>
              <th>Přijmení</th>
              <th>Upravit</th>
            </tr>
          </thead>
          <tbody>
            <?php
                 $sql = $mysqli->prepare("SELECT id_book, title, ean, authors.firstname, authors.lastname  FROM books
                                          JOIN book_authors USING (id_book)
                                          JOIN authors USING (id_author)
                                          ");
                 $sql->execute();
                 $result = $sql->get_result();
                 while ($books = $result->fetch_assoc()) {
                 ?>
                <tr>
                 <td> <?php echo $books['id_book'];  ?> </td>
                 <td> <?php echo $books['title'];  ?> </td>
                 <td> <?php  echo $books['ean']; ?> </td>
                 <td> <?php echo $books['firstname']; ?> </td>
                 <td> <?php echo $books['lastname']; ?> </td>
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
<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR .  'footer.php' ?></body>
