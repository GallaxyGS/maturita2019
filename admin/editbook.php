<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . 'header.php' ;
$idbook = filter_input(INPUT_GET, "idbook");
$submit=filter_input(INPUT_POST, "submit");
if ($idbook != "") {
if($submit == 'submit' ) {
  $title = filter_input(INPUT_POST, "title");
  $ean = filter_input(INPUT_POST, "ean");
  $pages_count = filter_input(INPUT_POST, "pages_count");
  $year = filter_input(INPUT_POST,"year");
  $idauthor = filter_input(INPUT_POST, "id_author");
  $sqlu = $mysqli->prepare("
  UPDATE books
    SET
      title = ?,
      ean = ?,
      pages_count = ?,
      year = ?
    WHERE id_book = ?;
    ");
    $sqlu->bind_param('ssssd', $title, $ean, $pages_count, $year, $idbook);
    $sqlu->execute();
    echo "provedeno";

  $sqlu2 = $mysqli->prepare("
    UPDATE book_authors
    SET id_author = ?
    WHERE id_book = ?;
    ");
    $sqlu2->bind_param('dd', $idauthor, $idbook);
    $sqlu2->execute();
    echo "provedeno2";



}

$sql = $mysqli->prepare("
SELECT b.id_book, title, ean, pages_count, year, created_at, a.id_author, a.firstname, a.lastname
  FROM books b
  JOIN book_authors ba ON b.id_book = ba.id_book
  JOIN authors a ON a.id_author = ba.id_author
  WHERE b.id_book=?;");
$sql->bind_param("d" , $idbook);
$sql->execute();
$book = $sql->get_result()->fetch_assoc();

$sql2 = $mysqli->prepare("
  SELECT *
  FROM authors;
  ");
$sql2->execute();
$authors = $sql2->get_result();
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
<form method="post" >
  <div class="form-group">
    <label for="exampleInputEmail1">Název knihy:</label>
    <input type="text" name="title" class="form-control" id="title" aria-describedby="booktitle" placeholder="Název knihy" value="<?php echo $book['title'] ;?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">EAN:</label>
    <input type="text" name="ean" class="form-control" id="title" aria-describedby="booktitle" placeholder="EAN:" value="<?php echo $book['ean'] ;?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Počet stran</label>
    <input type="text" name="pages_count" class="form-control" id="title" aria-describedby="booktitle" placeholder="EAN:" value="<?php echo $book['pages_count'] ;?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Rok vydání:</label>
    <input type="text" name="year" class="form-control" id="title" aria-describedby="booktitle" placeholder="Rok:" value="<?php echo $book['year'] ;?>">
  </div>
  <select name="id_author" class="custom-select">
    <?php while ($author = $authors->fetch_assoc()) {?>
      <option <?php if($book['id_author'] == $author['id_author']) { ?> selected <?php } ?> value="<?php echo $author['id_author'] ?>">
        <?php echo $book['id_author']
      . " " . $author['id_author']; echo  $author['firstname']
      . " " . $author['lastname']; ?></option>
    <?php } ;?>
  </select>
  <button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
<?php } else {echo "Nebylo zadáno ID!";}?>
<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR .  'footer.php' ?></body>
