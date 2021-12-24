<?php 

session_start();
require 'functions.php';

// set cookie
if ( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM admin WHERE id = $id");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if ( $key === hash('sha256', $row['username']) ) {
		$_SESSION['login'] = true;
	}

	
}

if ( isset($_SESSION["login"]) ) {
	header("Location: menu.php");
	exit;
}
 

if ( isset($_POST["login"])) {
	
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

	// cek username
	if ( mysqli_num_rows($result) === 1 ) {
		
		// cek password
		$row = mysqli_fetch_assoc($result);
		if ( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;
			

			$_SESSION["userId"] = $row["id"];
				
			// cek remember me
			if ( isset($_POST["remember"]) ) {
				//buat cookie
				setcookie('login', 'true', time() + 60 );
				setcookie('key', hash('sha256', $row['username']), time() + 60);
			}

			header("Location: menu.php");
			exit;
		}

	}

	// jika cek username ada error kesini
	$error = true;
}



 ?>

<!DOCTYPE html>
<html>
<title>AmalQu App</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="shortcut icon" href="images/favicon.png">
<link rel="stylesheet" href="../style/warna.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-166295527-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-166295527-1');
</script>


<body class="w3-text-white warna-back">

<div class="w3-content w3-display-container" style="max-width:900px;">

<header class="w3-container w3-center w3-animate-left">
  <a href="index.php" style="text-decoration:none;"><h1><img src="images/gamfic logo.png" width="250px"></h1></a>
</header>

<div class="w3-container w3-margin-top w3-mobile">

	<form action="" method="POST" class="w3-container w3-large w3-theme-d4">

	<h1>Log in as Administrator</h1>
<?php if (isset($error)) : ?>
	<p style="color: red; font-style: italic;">Sorry, your password is incorrect</p>
<?php endif; ?>
	<p>
	<label for="username">Username</label>
	<input class="w3-input w3-round-xxlarge" type="text" style="width:100%" name="username" id="username" required>
	</p>
	<p>
	<label for="password">Password</label>
	<input class="w3-input w3-round-xxlarge" type="password" style="width:100%" name="password" id="password" required>
	</p>

	<p>
	<input class="w3-check" type="checkbox" checked="checked" name="remember">
	<label>Stay logged in</label></p>

	<p>
	<button type="submit" name="login" class="w3-button w3-section w3-theme-d2 w3-ripple w3-round-xxlarge"> Log in</button>
	</p>
	<p>Not a member yet? <a href="#" style="text-decoration: none; color: #e4c6db;"><i>Register now</i></a>.</p>


	</form>

</div>

</div>

  <div class="w3-container">
    <p class="w3-large"><a href="https://stmikglobal.ac.id/" target="_blank" style="text-decoration: none;">School of Information and Computer Science STMIK Bina Sarana Global</a></p>
    <p><a href="https://miqbalhanafri.wordpress.com/" target="_blank" style="text-decoration: none;">Created by Muhammad Iqbal Hanafri</a></p>
  </div>
  
</body>
</html>

