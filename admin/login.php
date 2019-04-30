<?php ?>
<head>
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
session_start();
include_once("db.php");
$salt = 'safsafnsaklfas"§¨ů¨ůů§ú';
if(isset($_SESSION['id_user'])!="") {
	header("Location: index.php");
}
if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$result = mysqli_query($mysqli, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password . $salt). "'");
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['id_user'] = $row['id_user'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['id_role'] = $row['id_role'];
		header("Location: index.php");
	} else {
		$error_message = "Incorrect Email or Password!!!";
	}
}
?>
<body>
<div class="container">
	<h2>Přihlašovací stránka:</h2>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Přihlášení</legend>
					<div class="form-group">
						<label for="name">Email</label>
						<input type="text" name="email" placeholder="Your Email" required class="form-control" />
					</div>
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Your Password" required class="form-control" />
					</div>
					<div class="form-group">
						<input type="submit" name="login" value="Login" class="btn btn-primary" />
					</div>
				</fieldset>
			</form>
			<span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 text-center">
		New User? <a href="register.php">Sign Up Here</a>
		</div>
	</div>
</div>
</body>
