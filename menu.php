<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$userid = $_SESSION["userId"]; 
$userku = query("SELECT username FROM user WHERE id = '$userid' ");
$info = query("SELECT informasi FROM info_admin");

$tampil = query("SELECT progress.user, SUM(marketing.points) AS totalpoints
	FROM marketing 
	LEFT JOIN progress ON progress.opsi = marketing.id 
	WHERE progress.user = '$userid'
	GROUP BY user
	ORDER BY SUM(marketing.points) DESC 
	");

$tampil2 = query("SELECT progress.user, SUM(marketing.points) AS total2, user.username, uploadfoto.gambar, uploadfoto.motivasi
	FROM (((progress
	LEFT JOIN marketing ON progress.opsi = marketing.id)
	LEFT JOIN user ON progress.user=user.id)
	LEFT JOIN uploadfoto ON progress.user=uploadfoto.user)
	");

$tampil4 = query("SELECT * FROM uploadfoto WHERE user='$userid' ");

$tampil3 = query("SELECT COUNT(id) FROM progress WHERE user='$userid' ");

$tampil5 = query("SELECT progress.user, SUM(marketing.points) AS total5, user.username, uploadfoto.gambar, uploadfoto.motivasi
	FROM (((progress
	LEFT JOIN marketing ON progress.opsi = marketing.id)
	LEFT JOIN user ON progress.user=user.id)
	LEFT JOIN uploadfoto ON progress.user=uploadfoto.user)
	GROUP BY user 
	HAVING SUM(marketing.points) 
	ORDER BY SUM(marketing.points) DESC 
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
<link rel="stylesheet" href="style/warna.css">

<style>

.checked {
  color: orange;
}

</style>

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
  <a href="menu.php" style="text-decoration:none;"><h1><img src="images/gamfic logo.png" width="250px"></h1></a>
</header>

<div class="w3-container w3-margin-top w3-large w3-mobile">

	<p> Hello

		<span style="color: yellow; font-size: 30px;">
		<?php foreach ( $userku as $row ) : ?>
			<?= $row["username"]; ?>,
		<?php endforeach; ?>
		</span>

	welcome to AmalQu App. </p>

		<?php foreach ( $tampil as $row ) : ?>
			<?php $totalpoints = $row["totalpoints"]; ?>
		<?php endforeach; ?>

		<span class="heading">Prestasi-mu sahabat :</span>
		<span class="fa fa-star 

		<?php
		$t = $GLOBALS['totalpoints'];

		if ($t > "50") {
		  echo "checked";
		} else {
		  echo "";
		}
		?>

		" style="font-size: 40px;"></span>
		<span class="fa fa-star 

		<?php
		$t = $GLOBALS['totalpoints'];

		if ($t > "1000") {
		  echo "checked";
		} else {
		  echo "";
		}
		?>

		" style="font-size: 40px;"></span>
		<span class="fa fa-star 

		<?php
		$t = $GLOBALS['totalpoints'];

		if ($t > "3000") {
		  echo "checked";
		} else {
		  echo "";
		}
		?>

		" style="font-size: 40px;"></span>
		<span class="fa fa-star 

				<?php
		$t = $GLOBALS['totalpoints'];

		if ($t > "5000") {
		  echo "checked";
		} else {
		  echo "";
		}
		?>

		" style="font-size: 40px;"></span>
		<span class="fa fa-star 

				<?php
		$t = $GLOBALS['totalpoints'];

		if ($t > "7000") {
		  echo "checked";
		} else {
		  echo "";
		}
		?>

		" style="font-size: 40px;"></span>


		. Update your photo here : <a href="uploadfoto.php" class="w3-button w3-large w3-theme-d4 w3-round-xxlarge">upload</a>


<!-- Foto dan motivasi -->
<div class="w3-row">
	  <div class="w3-col w3-container w3-xxlarge w3-third">
		<?php foreach ( $tampil4 as $row ) : ?>
		<img src="uploadfoto/<?= $row["gambar"]; ?>" class="w3-round w3-hover-sepia" alt="amalqu" width="100%">
		<?php endforeach; ?>
	  </div>
	  <div class="w3-col w3-container w3-xxlarge w3-twothird">
			
			  
			  <?php foreach ( $tampil4 as $row ) : ?>
			  	<i class="fa fa-quote-right w3-xxlarge"></i>
			  	<?= $row["motivasi"]; ?>

			<a href="one_delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-theme-d3 w3-ripple w3-round-xxlarge"><i class='far fa-trash-alt' style='font-size:24px'></i></a>

			  <?php endforeach; ?>
		
	  </div>
</div>
<!-- End foto dan motivasi -->	



	<!-- Informations from teachers -->
	<div class="w3-panel w3-yellow w3-display-container">
	  <span onclick="this.parentElement.style.display='none'"
	  class="w3-button w3-large w3-display-topright">&times;</span>
	  <h1>Informations :</h1>
	  <p style="font-size: 25px;">

		<?php foreach ( $info as $row ) : ?>
			<i class='fas fa-angle-right'></i> <?= $row["informasi"]; ?><br>
		<?php endforeach; ?>

	  </p>
	</div>
	<!-- End information -->


<!-- Mendapatkan nilai total -->
<?php $i = 1; ?>	
<?php foreach ( $tampil2 as $row2 ) : ?>
	
	<?php $totalpoints = $row2["total2"]; ?>

<?php $i++; ?>
<?php endforeach; ?>
<!-- End mendapatkan nilai total -->

<!-- Mendapatkan variabel pointsku -->
<?php foreach ( $tampil as $row ) : ?>

	<?php $pointsku = $row["totalpoints"]; ?>

<?php endforeach; ?>
<!-- End mendapatkan variabel pointsku -->

	<div class="w3-row w3-theme-l3">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="#" class="w3-button w3-section w3-theme-l1 w3-ripple w3-round-xxlarge" style="width:100%"><?php foreach ( $tampil as $row ) : ?><?= $row["totalpoints"]; ?><?php endforeach; ?> Points</a></h1></div>
	  <div class="w3-col w3-container w3-twothird"><p>Silakan sahabat tingkatkan poin sebanyak-banyaknya. Perbanyak membaca Al Qur'an, zikir, puasa, sholat tahajjud, sholat dhuha dan sebagainya. Selamat berjuang...!!</p></div>
	</div>
	<div class="w3-row w3-theme-d1">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="#" class="w3-button w3-section w3-theme-l1 w3-ripple w3-round-xxlarge" style="width:100%">Rank 

<!-- Mendapatkan ranking -->
<!-- Masih problem di definisi variabel pointsku, sementara di hide -->
			<?php error_reporting(0); ?>
			<?php $pointsku = $GLOBALS ['pointsku']; ?>

			<?php $i = 1; ?>	
			<?php foreach ( $tampil5 as $row ) : ?>
				
				<?php $i; ?>
				<?php $pointsall = $row["total5"]; ?>

				<?php if ($GLOBALS ['pointsku'] == null) {
					echo "";
				} else if ($GLOBALS ['pointsku'] == $pointsall) {
					echo $i;
				} else {
					echo "";
				}

				 ?>
				
			<?php $i++; ?>
			<?php endforeach; ?>	
<!-- End mendapatkan ranking -->

	  </a></h1></div>
	  <div class="w3-col w3-container w3-twothird"><p>Alhamdulillah, ini ranking sahabat ya. Terus maksimalkan dan update ya, bagi yang masuk ranking 5 besar setiap bulannya akan mendapatkan the best sholeh/ah of the month. Chayoo...!!</p></div>
	</div>
	<div class="w3-row w3-theme-l3">
	  <div class="w3-col w3-container w3-xxlarge w3-third"><h1><a href="#" class="w3-button w3-section w3-theme-l1 w3-ripple w3-round-xxlarge" style="width:100%"><?php foreach ( $tampil3 as $row ) : ?>
	  	
	  		<?php 
	  			if ($row["COUNT(id)"] == 0) {
	  				echo "";
	  			} else {
	  				echo $row["COUNT(id)"];
	  			}
	  			
	  		?>
	  <?php endforeach; ?> Updates</a></h1></div>
	  <div class="w3-col w3-container w3-twothird"><p>Jumlah update laporan kamu hingga hari ini sahabat. Lanjutkan terus, tingkatkan ibdah dan update ya. Jadilah yang terbaik and do the best...!!</p></div>
	</div>


</div>

</div>

  <div class="w3-container">
    <p class="w3-large"><a href="https://stmikglobal.ac.id" target="_blank" style="text-decoration: none;">School of Information and Computer Science STMIK Bina Sarana Global</a></p>
    <p><a href="https://miqbalhanafri.wordpress.com/" target="_blank" style="text-decoration: none;">Created by Muhammad Iqbal Hanafri</a></p>
  </div>

</body>
</html>

