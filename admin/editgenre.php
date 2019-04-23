<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR . 'header.php' ;
$id_genre = filter_input(INPUT_GET, "id_genre");
$submit = filter_input(INPUT_POST, "submit");
$name = filter_input(INPUT_GET, "name");
if ($id_genre != "") {
if($submit == 'submit' ) {
  $name = filter_input(INPUT_POST, "name");
  var_dump($id_genre);
  $sqlu = $mysqli->prepare("
  UPDATE genres
    SET
      name = ?
    WHERE id_genre = ?
    ");
    $sqlu->bind_param("sd", $name, $id_genre);
    $sqlu->execute();
    echo "provedeno";



}

$sql2 = $mysqli->prepare("
  SELECT *
  FROM genres
  WHERE id_genre = ?;
  ");
$sql2->bind_param("d", $id_genre);
$sql2->execute();
$genres = $sql2->get_result();

$genre = $genres->fetch_assoc();
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
    <label for="exampleInputEmail1">Jméno žánru:</label>
    <input type="text" name="name" class="form-control" id="title" aria-describedby="booktitle" placeholder="Jméno" value="<?php echo $genre['name'] ;?>">
  </div>

  <button name="submit" value="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
<?php } else {echo "Nebylo zadáno ID!";}?>




<?php include_once __DIR__ . DIRECTORY_SEPARATOR . "inc" . DIRECTORY_SEPARATOR .  'footer.php' ?></body>
