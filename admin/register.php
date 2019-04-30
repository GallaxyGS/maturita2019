<?php include_once 'db.php' ?>

<head>
   <link href = "css/bootstrap.min.css" rel = "stylesheet">

   <style>
   body {
   	background-image: url("https://psychologiepisma.cz/wp-content/uploads/2018/05/pozadi-knihovna.jpg");
   	font-family: 'Source Sans Pro', sans-serif;
   }
   * {
     box-sizing: border-box;
   }

   input[type=text], select, textarea {
     width: 100%;
     padding: 12px;
     border: 1px solid #ccc;
     border-radius: 4px;
     resize: vertical;
   	font-family: 'Source Sans Pro', sans-serif;
   }
   input[type=password], select, textarea {
     width: 100%;
     padding: 12px;
     border: 1px solid #ccc;
     border-radius: 4px;
     resize: vertical;
   }

   label {
     padding: 12px 12px 12px 0;
     display: inline-block;
   	font-family: 'Source Sans Pro', sans-serif;
   }

   input[type=submit] {
     background-color: #4CAF50;
     color: white;
     padding: 12px 20px;
     border: none;
     border-radius: 4px;
     cursor: pointer;
     float: right;
   	font-family: 'Source Sans Pro', sans-serif;
   }

   input[type=submit]:hover {
     background-color: #45a049;
   }

   .container {
     border-radius: 5px;
   	margin: auto;
   	width: 30%;
     background-color: #f2f2f2;
     padding: 20px;
   }

   .col-25 {
     float: left;
     width: 25%;
     margin-top: 6px;
   }

   .col-75 {
     float: left;
     width: 75%;
     margin-top: 6px;
   }

   /* Clear floats after the columns */
   .row:after {
     content: "";
     display: table;
     clear: both;
   }

   /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
   @media screen and (max-width: 600px) {
     .col-25, .col-75, input[type=submit] {
       width: 100%;
       margin-top: 0;
     }
   }
   </style>

</head>
<?php
include_once("db.php");
session_start();
if(isset($_SESSION['id_user'])) {
	header("Location: index.php");
}
$error = false;
if (isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
		$error = true;
		$uname_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}

	if (!$error) {
    $salt = 'safsafnsaklfas"§¨ů¨ůů§ú';
    $hashedPassword = md5($password . $salt);


      $sqli = $mysqli->prepare("
        INSERT INTO users(name, email, password) VALUES(?,?,?);"
        );
      $sqli->bind_param('sss', $name, $email, $hashedPassword);
      $sqli->execute();
	}
}
?>
<div class="container">
<h2>Registace</h2>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
				<fieldset>
					<legend>Registrování</legend>
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($uname_error)) echo $uname_error; ?></span>
					</div>
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
					</div>
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Password" required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
					</div>

					<div class="form-group">
						<input type="submit" name="signup" value="Sign Up" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-success"><?php if (isset($success_message)) { echo $success_message; } ?></span>
			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
		Already Registered? <a href="login.php">Login Here</a>
		</div>
	</div>
</div>
