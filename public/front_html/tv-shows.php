<?php $page = "tvshows"; include "header.php" ?>
	<div class="container-fluid banner-cont">
		<div class="banner-wrapper">
			<div class="banner-outer">
				<div class="banner-slider">
					<div class="slide active"><img src="images/banners/1.jpg"></div>
					<div class="slide"><img src="images/banners/1.jpg"></div>
					<div class="slide"><img src="images/banners/1.jpg"></div>
					<div class="slide"><img src="images/banners/1.jpg"></div>
					<div class="slide"><img src="images/banners/1.jpg"></div>
				</div>
				<div class="bg-ban"></div>
			</div>
			<div class="banner-nav">
				<a href="javascript:;" class="prev"><img src="images/banner-left.png"></a>
				<a href="javascript:;" class="next"><img src="images/banner-right.png"></a>
			</div>
			<div class="banner-dots"></div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="container">
			<?php $arr = array("History","Travel","Food","Fiction","Non Fiction");
				foreach($arr as $a){
					$k=8;
					$class="new";
					if($a == "History"){ $k=2; $class="new"; }
					if($a == "Food") { $k=4; $class="coming-soon"; }
					if($a == "Fiction") { $k=3; }
					if($a == "Travel") { $k=5; }
			 ?>
			
			<div class="row tray-row wsc <?php echo $a=='Continue Watching'?'prog-bar':''; ?>">
				<div class="col-12">
					<h2><?php echo $a; ?> <a href="show-all.php"><span>Show All</span></a></h2>
				</div>
				<div class="col-12 tray">
					<div class="tray-wrap">
						<?php for($i=1;$i<=$k;$i++){ ?>
						<figure class="<?php echo $class; ?> premium">
							<a href=""><img src="images/banners/sb-1.jpg" class="img-fluid"></a>
							<figcaption>
								<h3 class="clip-text16"><a href="">Lootere: Bandits Of British India Season 2</a></h3>
								<p class="clip-text16"><span>Season 1 </span>"Lorem Epsum is simple dummy"</p>
								<span class="premium"></span>
								<div class="prog-bar"><span class="prog-d" style="width:40%"></span></div>
							</figcaption>
							<span class="coming-soon">Coming Soon</span><span class="new">New</span>
						</figure>
						<?php } ?>	
					</div>
				</div>
				<div class="scroller"><span class="thumb"></span></div>
			</div>

		<?php } ?>

		<div class="row tray-row <?php echo $a=='Continue Watching'?'prog-bar':''; ?>">
				<div class="col-6">
					<h2>Mythology <a href="show-all.php"><span>Show All</span></a></h2>
				</div>
				<div class="col-6">
					<h2>Comedy <a href="show-all.php"><span>Show All</span></a></h2>
				</div>
				<div class="col-6 tray">
					<div class="tray-wrap">
						<?php for($i=1;$i<=2;$i++){ ?>
						<figure class="<?php echo $class; ?> premium">
							<a href=""><img src="images/banners/sb-1.jpg" class="img-fluid"></a>
							<figcaption>
								<h3 class="clip-text16"><a href="">Lootere: Bandits Of British India Season 2</a></h3>
								<p class="clip-text16"><span>Season 1 </span>"Lorem Epsum is simple dummy"</p>
								<span class="premium"></span>
								<div class="prog-bar"><span class="prog-d" style="width:40%"></span></div>
							</figcaption>
							<span class="coming-soon">Coming Soon</span><span class="new">New</span>
						</figure>
						<?php } ?>	
					</div>
				</div>
				<div class="col-6 tray">
					<div class="tray-wrap">
						<?php for($i=1;$i<=2;$i++){ ?>
						<figure class="<?php echo $class; ?> premium">
							<a href=""><img src="images/banners/sb-1.jpg" class="img-fluid"></a>
							<figcaption>
								<h3 class="clip-text16"><a href="">Lootere: Bandits Of British India Season 2</a></h3>
								<p class="clip-text16"><span>Season 1 </span>"Lorem Epsum is simple dummy"</p>
								<span class="premium"></span>
								<div class="prog-bar"><span class="prog-d" style="width:40%"></span></div>
							</figcaption>
							<span class="coming-soon">Coming Soon</span><span class="new">New</span>
						</figure>
						<?php } ?>	
					</div>
				</div>
				
			</div>



		</div>
	</div>
<?php include "footer.php";