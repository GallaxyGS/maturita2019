<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . 'header.php' ;
$id_author = filter_input(INPUT_GET, "id_author");
$submit = filter_input(INPUT_POST, "submit");
if ($id_author != "") {
if($submit == 'submit' ) {
  $firstname = filter_input(INPUT_POST, "firstname");
  $lastname = filter_input(INPUT_POST, "lastname");
  var_dump($firstname, $lastname, $id_author);
  $sqlu = $mysqli->prepare("
  UPDATE authors
    SET
      firstname = ?,
      lastname = ?
    WHERE id_author = ?
    ");
    $sqlu->bind_param("ssd", $firstname, $lastname, $id_author);
    $sqlu->execute();
    echo "provedeno";




}

$sql2 = $mysqli->prepare("
  SELECT *
  FROM authors
  WHERE id_author = ?;
  ");
$sql2->bind_param("d", $id_author);
$sql2->execute();
$authors = $sql2->get_result();

$author = $authors->fetch_assoc();
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
    <label for="exampleInputEmail1">Jméno autora:</label>
    <input type="text" name="firstname" class="form-control" id="title" aria-describedby="booktitle" placeholder="Jméno" value="<?php echo $author['firstname'] ;?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Přijímení autora:</label>
    <input type="text" name="lastname" class="form-control" id="title" aria-describedby="booktitle" placeholder="Přijímení" value="<?php echo $author['lastname'] ;?>">
  </div>

  <button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
<?php } else {echo "Nebylo zadáno ID!";}?>




<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR .  'footer.php' ?></body>
