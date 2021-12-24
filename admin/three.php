<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$info = query("SELECT * FROM info_admin");

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
  <a href="index.php" style="text-decoration:none;"><h1><img src="images/gamfic logo.png" width="250px"></h1></a>
</header>

<div class="w3-container w3-margin-top w3-large w3-mobile">
	
	<div class="w3-row">
	  <div class="w3-col w3-container w3-xxlarge"><h1>Give informations or instructions to the members</a></h1></div>
	</div>
	<div class="w3-row">
	  <div class="w3-col w3-container"><p>You can give some informations to the members</p></div>
	</div>

<!-- Looping for the div table -->
<?php $i = 1; ?>	
<?php foreach ( $info as $row ) : ?>
		<!-- Looping for change colour div -->
		<?php if ( $i % 2 == 0 ) : ?>
			<div class="w3-row w3-theme-l1">
			<?php else : ?>
			<div class="w3-row w3-theme-l3">	
		<?php endif; ?>
		<!-- End div -->
	  <div class="w3-col w3-container w3-xxlarge w3-quarter"><h1><?= $i; ?>. Info <!-- <?= $i; ?> --> :</h1></div>
	  <div class="w3-col w3-container w3-half"><p><?= $row["informasi"]; ?></p></div>
	  <div class="w3-col w3-container w3-quarter"><a href="three_edit.php?id=<?= $row["id"]; ?>" class="w3-button w3-section w3-theme-d1 w3-ripple"><i class='far fa-edit' style='font-size:24px'></i></a><a href="three_delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Do you want to delete?');" class="w3-button w3-section w3-theme-d1 w3-ripple"><i class='far fa-trash-alt' style='font-size:24px'></i></a></div>
	</div>

<?php $i++; ?>
<?php endforeach; ?>	
<!-- End looping for the div table -->

	<div class="w3-row">
		<div class="w3-col w3-container">
		<a href="three_add.php" class="w3-button w3-section w3-theme-d3 w3-ripple w3-round-xxlarge">Add information</a> <!-- <a href="phase_3_1_step1_changeorder_flipped.php" class="w3-button w3-section w3-green w3-ripple">Change order</a>--> &nbsp<a href="menu.php" class="w3-button w3-section w3-theme-d3 w3-ripple w3-round-xxlarge"><i class='fas fa-undo'></i></a></div>
	</div> 
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