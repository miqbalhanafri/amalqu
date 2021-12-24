<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
  header("Location: login.php");
  exit;
}

// memanggil functions.php
require 'functions.php';
// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$dataku = query("SELECT * FROM user WHERE id=$id")[0]; 
// var_dump($mhs[0]["nama"]);
// query dengan nol dipindah ke query sebelumnya 

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
  // var_dump($_POST); untuk nge-test

  // cek apakah data berhasil diubah atau tidak
  if ( ubahuser($_POST) >= 0 ) {
    echo "
      <script>
      alert('Your data has been changed!');
      document.location.href = 'one.php';
      </script>
    ";
  } else {
    echo "
      <script>
      alert('Sorry, your data didn't changed!');
      document.location.href = 'one.php';
      </script>
    ";
  }

}

?>

<!DOCTYPE html>
<html>
<title>GlooBal Marketing</title>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="shortcut icon" href="images/favicon.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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


<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-theme-d3 w3-xxlarge" style="width:70px">
  <a href="menu.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i></a> 
  <a href="one.php" class="w3-bar-item w3-button"><i class="fas fa-user-astronaut"></i></a> 
  <a href="two.php" class="w3-bar-item w3-button"><i class="fa fa-book"></i></a> 
  <a href="three.php" class="w3-bar-item w3-button"><i class="fas fa-satellite-dish"></i></a>
  <a href="four.php" class="w3-bar-item w3-button"><i class="fa fa-history"></i></a>
  <a href="chat.php" class="w3-bar-item w3-button"><i class="fa fa-comments"></i></a>
  <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-power-off"></i></a> 
</div>

<div style="margin-left:70px">
<!-- Last Sidebar -->


<div class="w3-content w3-display-container" style="max-width:900px">

<header class="w3-container w3-center w3-animate-left">
  <a href="index.php" style="text-decoration:none;"><h1><img src="images/gamfic logo.png" width="250px"></h1></a>
</header>

<div class="w3-container w3-margin-top w3-large w3-mobile">
	
	<div class="w3-row">
	  <div class="w3-col w3-container w3-xxlarge"><h1>Edit the user of GlooBal Marketing Fun</h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container"><p>You can edit the username and password
	  		<!-- <select class="w3-select w3-border" name="option" style="max-width:250px">
				<option value="" disabled selected>Choose your option</option>
				<option value="1">Option 1</option>
				<option value="2">Option 2</option>
				<option value="3">Option 3</option>
			</select> -->
	  </div>
	</div>
	
	<form action="" class="w3-container w3-theme-d3" method="POST" enctype="multipart/form-data">
	<div class="container">
        <div class="comment">
            <input type="hidden" name="id" value="<?= $dataku["id"]; ?>">
            <!-- <textarea class="textinput" type="text" name="keterangan" required value="<?= $dataku["keterangan"]; ?>"></textarea> -->

             <p>
  <label>Username</label>
  <input class="w3-input w3-round-xxlarge" type="text" style="width:100%" name="username" value="<?= $dataku["username"]; ?>" required>
  </p>
            <p>
  <label for="password">Password</label>
  <input class="w3-input w3-round-xxlarge" type="password" style="width:100%" name="password" id="password" required>
  </p>
  <p>
  <label for="password2">Confirm Password</label>
  <input class="w3-input w3-round-xxlarge" type="password" style="width:100%" name="password2" id="password2" required>
  </p>
        </div>
    </div>
	  
	  <button class="w3-button w3-section w3-theme-d1 w3-round-xxlarge w3-ripple" type="submit" name="submit"> Save </button>
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

