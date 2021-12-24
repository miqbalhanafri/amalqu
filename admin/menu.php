<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$userid = $_SESSION["userId"]; 
$userku = query("SELECT username FROM admin WHERE id = '$userid' ");

// Menampilkan jumlah siswa
$query1 = query("SELECT * FROM user");
$jumlah = count($query1);
$jumlahku = $jumlah;

if ($jumlah == 0) {
	$jumlah = 1; $jumlahku = 0;
} 


$tampil = query("SELECT progress.user, SUM(marketing.points) AS total, user.username, uploadfoto.gambar, uploadfoto.motivasi
	FROM (((progress
	LEFT JOIN marketing ON progress.opsi = marketing.id)
	LEFT JOIN user ON progress.user=user.id)
	LEFT JOIN uploadfoto ON progress.user=uploadfoto.user)
	GROUP BY user 
	HAVING SUM(marketing.points) 
	ORDER BY SUM(marketing.points) DESC
	");
// LIMIT 10 apabila ingin dibatasi jumlah yang tampil hanya 10

$tampil2 = query("SELECT progress.user, SUM(marketing.points) AS total2, user.username, uploadfoto.gambar, uploadfoto.motivasi
	FROM (((progress
	LEFT JOIN marketing ON progress.opsi = marketing.id)
	LEFT JOIN user ON progress.user=user.id)
	LEFT JOIN uploadfoto ON progress.user=uploadfoto.user)
	");


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
  <a href="index.php" style="text-decoration:none;"><h1>
  	<img src="images/gamfic logo.png" width="250px">
  </h1></a>
</header>

<div class="w3-container w3-margin-top w3-large w3-mobile">


	<div class="w3-row">
	  <div class="w3-col w3-container w3-xxlarge"><h1>Leaderboard of Ibadah</h1></div>
	</div>

	<div class="w3-row">
	  <div class="w3-col w3-container">

	<p>Hello 

		<span style="color: yellow; font-size: 30px;">
		<?php foreach ( $userku as $row ) : ?>
			<?= $row["username"]; ?>
		<?php endforeach; ?>
		</span>

	, welcome to AmalQu App administrator. </p>

	  </div>
	</div>



	<!-- User -->
	<div class="w3-row w3-theme-d3">

	  <div class="w3-col w3-container w3-xxlarge w3-half"><a href="#" class="w3-button w3-section w3-theme-l3 w3-ripple w3-round-xxlarge" style="width:100%"><i class='far fa-id-card'></i> Total <?= $jumlahku; ?> Members</a></div>
	  <div class="w3-col w3-container w3-xxlarge w3-half"><a href="settings.php" class="w3-button w3-section w3-theme-l3 w3-ripple w3-round-xxlarge" style="width:100%"><i class='fas fa-cog'></i> Setting Points</a></div>

	</div>


<!-- Looping for the div table -->

	<div class="w3-row w3-theme-l1">	
	  <div class="w3-col w3-container w3-xxlarge w3-quarter"><h1></h1></div>
	  <div class="w3-col w3-container w3-half"><h1 style="color: yellow;">Ranking GlooBal</h1></div>
	  <div class="w3-col w3-container w3-quarter"><h1 style="color: yellow;">Points</h1></div>
	</div>	
<!-- End looping for the div table -->


		<!-- Mendapatkan nilai total -->
		<?php $i = 1; ?>	
		<?php foreach ( $tampil2 as $row2 ) : ?>
			
			<?php $totalpoints = $row2["total2"]; ?>

		<?php $i++; ?>
		<?php endforeach; ?>
		<!-- End mendapatkan nilai total -->


		<!-- Looping for the div table -->
		<?php $i = 1; ?>	
		<?php foreach ( $tampil as $row ) : ?>

				<!-- Looping for change colour div -->
				<?php if ( $i % 2 == 0 ) : ?>
					<div class="w3-row w3-theme-d1">
					<?php else : ?>
					<div class="w3-row w3-theme-l3">	
				<?php endif; ?>
				<!-- End div -->
			  <div class="w3-col w3-container w3-xxlarge w3-quarter"><h1><img src="../uploadfoto/<?= $row["gambar"]; ?>" class="w3-round w3-hover-sepia" alt="<?= $row["username"]; ?>" width="100%"></h1>
			  </div>
			  <div class="w3-col w3-container w3-half"><p style="font-size: 25px;"><?= $i; ?>. <?= $row["username"]; ?></p><p><?= $row["motivasi"]; ?></p><div class="w3-light-grey w3-round-xxlarge">
				 	<div class="w3-container w3-theme-d4 w3-round-xxlarge" style="width:<?= round(($row["total"]/$GLOBALS['totalpoints'])*100); ?>%"><?= round(($row["total"]/$GLOBALS['totalpoints'])*100); ?>%</div>
				</div></p></div>
			  <div class="w3-col w3-container w3-quarter"><a href="#" class="w3-button w3-section w3-theme-l1 w3-ripple w3-round-large" style="width:100%;"><h1><i class='fas fa-dollar-sign'></i> <?= $row["total"]; ?></h1></a></div> 
			</div>

		<?php $i++; ?>
		<?php endforeach; ?><br>	
		<!-- End looping for the div table -->


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

