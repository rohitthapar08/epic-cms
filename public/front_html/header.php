<!doctype html> 
<html lang="en">
<head>
	<title>Home | Epicon</title>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/jquery-ui.min.css" />
	<link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css" />
	<link rel="icon" href="https://epicon.epicchannel.com/assets/epic-fv.png" type="image/png">
	<link rel="stylesheet" href="css/custom.css" />
</head>
<body>
	<div class="container-fluid header-fixed">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-1">
					<h1><a href="index.php"><img src="images/logo.png" alt="Epicon" title="Epicon" /></a></h1>
				</div>
				<div class="col-6">
					<ul class="nav">
						<li class="nav-item <?php echo $page=="home"?"selected":""; ?>"><a href="index.php" class="nav-link" title="Home">Home</a></li>
						<li class="nav-item <?php echo $page=="originals"?"selected":""; ?>" ><a href="originals.php" class="nav-link" title="Originals">Originals</a></li>
						<li class="nav-item <?php echo $page=="tvshows"?"selected":""; ?>"><a href="tv-shows.php" class="nav-link" title="TV Shows">TV Shows</a></li>
						<li class="nav-item <?php echo $page=="shorts"?"selected":""; ?>"><a href="shorts.php" class="nav-link" title="Shorts">Shorts</a></li>
						<li class="nav-item <?php echo $page=="specials"?"selected":""; ?>"><a href="specials.php" class="nav-link" title="Specials">Specials</a></li>
					</ul>
				</div>
				<div class="col-2 text-center search-box">
					Search&nbsp;&nbsp;<img src="images/search-icon.png" />
				</div>
				<div class="col-2 login text-center">
					Sourabh Pisolkar &nbsp;&nbsp;<img src="images/dwn-arrow-login.png" />
				</div>
				<div class="col-1 text-right">
					<a href="javascript:;"><img src="images/right-menu-icon.png"></a>
				</div>
			</div>

		</div>
	</div>