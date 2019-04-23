<?php
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<html lang = "en">

   <head>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">

      <style>
         body {
           font-family: arial;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #FFFFFF;
            background-image: url("https://psychologiepisma.cz/wp-content/uploads/2018/05/pozadi-knihovna.jpg")
         }

         .form-signin {
           font-family: arial;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #FFFFFF;
         }

         .form-signin .form-signin-heading,
         .form-signin .checkbox {
           font-family: arial;
            margin-bottom: 10px;
         }

         .form-signin .checkbox {
           font-family: arial;
            font-weight: normal;
         }

         .form-signin .form-control {
           font-family: arial;
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }

         .form-signin .form-control:focus {
            z-index: 2;
         }

         .form-signin input[type="email"] {
           font-family: arial;
            margin-bottom: 0px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#FFFFFF;
         }

         .form-signin input[type="password"] {
           font-family: arial;
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }

         h2{
           font-family: arial;
            text-align: center;
            color: #FFFFFF;
         }
      </style>

   </head>

   <body>

      <h2>Zadejte své přihlašovací údaje:</h2>
      <div class = "container form-signin">

         <?php
            $msg = '';

            if (isset($_POST['login']) && !empty($_POST['username'])
               && !empty($_POST['password'])) {

               if ($_POST['username'] == 'davca008@gmail.com' &&
                  $_POST['password'] == 'davca007') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time(1);
                  $_SESSION['username'] = 'Gallaxy';
                     header('Location: index.php ');
               }else {
                  $msg = 'Špatné přihlašovací údaje.';
               }
            }
         ?>
      </div>

      <div class = "container">

         <form class = "form-signin" role = "form"
            action = "login.php" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control"
               name = "username" placeholder = "Přihlašovací jméno"
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "Heslo" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit"
               name = "login">Přihlásit</button>
         </form>

         Klikněte zde pro <a href = "logout.php" tite = "Logout">odhlášení.

      </div>

   </body>
</html>
