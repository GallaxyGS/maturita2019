<?php ?>
<head>
 <link rel="stylesheet" type="text/css" href="login.css">
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
