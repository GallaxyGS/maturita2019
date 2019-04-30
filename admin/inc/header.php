
<?php
session_start();
if (!isset( $_SESSION['name'] )) {header ('location: login.php');}?>

<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "../" . DIRECTORY_SEPARATOR . "db.php";

 ?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>


<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">
              <span data-feather="index"></span>
              Domovská stránka <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="authors.php">
              <span data-feather="file"></span>
              Výpis autorů
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="genres.php">
              <span data-feather="shopping-cart"></span>
              Výpis žánrů
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="books.php">
              <span data-feather="users"></span>
              Výpis knih
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Administrace</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="editbook.php">
              <span data-feather="file-text"></span>
              Upravit knihu
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="editauthor.php">
              <span data-feather="file-text"></span>
              Upravit autora
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="editgenre.php">
              <span data-feather="file-text"></span>
              Upravit žánr
            </a>
          </li>
          Přihlášený uživatel: <?php  $_SESSION['name'] ?>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <span data-feather="file-text"></span>
              Odhlásit se
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
