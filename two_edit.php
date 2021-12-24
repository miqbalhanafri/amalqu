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
$dataku = query("SELECT * FROM theme_reason2 WHERE id=$id")[0]; 
// var_dump($mhs[0]["nama"]);
// query dengan nol dipindah ke query sebelumnya 

// cek apakah tombol submit sudah ditekan atau belum
if ( isset($_POST["submit"]) ) {
  // var_dump($_POST); untuk nge-test

  // cek apakah data berhasil diubah atau tidak
  if ( ubahreason2($_POST) >= 0 ) {
    echo "
      <script>
      alert('Your data has been changed!');
      document.location.href = 'two.php';
      </script>
    ";
  } else {
    echo "
      <script>
      alert('Sorry, your data didn't changed!');
      document.location.href = 'two.php';
      </script>
    ";
  }

}

?>

<!DOCTYPE html>
<html>
<title>AmalQu App</title>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="shortcut icon" href="images/favicon.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/warna.css">

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
  <a href="menu.php" class="w3-bar-item w3-button"><abbr title="Home"><i class="fa fa-home"></i></abbr></a> 
  <a href="one.php" class="w3-bar-item w3-button"><abbr title="Leaderboard"><i class="fa fa-users"></i></abbr></a> 
  <a href="two.php" class="w3-bar-item w3-button"><abbr title="Add Checklist"><i class="fas fa-tasks"></i></abbr></a> 
  <a href="three.php" class="w3-bar-item w3-button"><abbr title="Chatting"><i class="fa fa-comments"></i></abbr></a>
  <a href="logout.php" class="w3-bar-item w3-button"><abbr title="Log Out"><i class="fa fa-power-off"></i></abbr></a> 
</div>

<div style="margin-left:70px">
<!-- Last Sidebar -->


<div class="w3-content w3-display-container" style="max-width:900px">

<header class="w3-container w3-center w3-animate-left">
  <a href="index.php" style="text-decoration:none;"><h1><img src="images/gamfic logo.png" width="250px"></h1></a>
</header>

<div class="w3-container w3-margin-top w3-large w3-mobile">
	
	<div class="w3-row">
	  <div class="w3-col w3-container w3-xxlarge"><h1>Edit Progress </h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container"><p>Silakan update progressmu sahabat.</p>
	  </div>
	</div>
	
	<form action="" class="w3-container w3-theme-l3" method="POST" enctype="multipart/form-data">
	<div class="container">
        <div class="comment">
            <input type="hidden" name="id" value="<?= $dataku["id"]; ?>">
            <textarea name="nama" class="textinput" rows="2" cols="10" wrap="hard" style="overflow:hidden; resize:none; margin-top:15px; overflow-y: scroll; width: 100%;"><?= $dataku["nama"]; ?></textarea>
            <textarea name="reason" class="textinput" rows="5" cols="10" wrap="hard" style="overflow:hidden; resize:none; margin-top:15px; overflow-y: scroll; width: 100%;"><?= $dataku["reason"]; ?></textarea>
            <input type="hidden" name="user" value="<?= $dataku["user"]; ?>">
            <input type="hidden" name="pilih" value="<?= $dataku["pilih"]; ?>">
        </div>
    </div>
	  
	  <button class="w3-button w3-section w3-theme-l1 w3-ripple" type="submit" name="submit"> Save</button>
	</form>
	<!-- Button
	<div class="w3-row">
		<div class="w3-col w3-container"><a href="login.php" class="w3-button w3-section w3-green w3-ripple">back</a>
		<a href="login.php" class="w3-button w3-section w3-green w3-ripple">log out</a></div>
	</div> -->
</div>
  
</div>

  <div class="w3-container">
    <p class="w3-large">Graduate Institute of Digital Learning and Education</p>
    <p>powered by <a href="https://www.gidle.ntust.edu.tw/home.php?Lang=en" target="_blank">GIDLE - NTUST</a></p>
  </div>

</body>
</html>

