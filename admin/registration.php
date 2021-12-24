<?php 
require 'functions.php';

if ( isset($_POST["register"]) ) {

	if ( registrasiadmin($_POST) > 0 ) {
		echo "<script>
				alert('Congratulation, you have registered now!');
		</script>";
	} else {
		echo mysqli_error($conn);
	}
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

	<h1>Register Administrator</h1>
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
	<label for="password2">Confirm Password</label>
	<input class="w3-input w3-round-xxlarge" type="password" style="width:100%" name="password2" id="password2" required>
	</p>

	<p>
	<button type="submit" name="register" class="w3-button w3-section w3-green w3-ripple w3-round-xxlarge w3-theme-d3"> Register </button>
	</p>

	</form>

</div>

</div>

<!-- Footer website -->
  <div class="w3-container">
    <p class="w3-large"><a href="https://stmikglobal.ac.id" target="_blank" style="text-decoration: none;">School of Information and Computer Science STMIK Bina Sarana Global</a></p>
    <p><a href="https://miqbalhanafri.wordpress.com/" target="_blank" style="text-decoration: none;">Created by Muhammad Iqbal Hanafri</a></p>
  </div>
<!-- End footer website -->
  
</body>
</html>

