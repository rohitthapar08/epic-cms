<?php $page = "home"; include "header.php" ?>
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
			<?php $arr = array("Fresh On Epic","Trending","Continue Watching","Recently Added","Originals","TV Shows","Shorts");
				foreach($arr as $a){
					$k=8;
					$class="new";
					if($a == "Continue Watching"){ $k=2; $class="new"; }
					if($a == "Recently Added") { $k=4; $class="coming-soon"; }
					if($a == "Originals") { $k=3; }
					if($a == "Trending") { $k=5; }
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

		<div class="row tray-row wsc specials">
				<div class="col-12">
					<h2>Specials <a href="show-all.php"><span>Show All</span></a></h2>

				</div>
				<div class="col-12 tray">
					<div class="tray-wrap">
						<?php for($i=1;$i<=$k;$i++){ ?>
						<figure class="new">
							<a href=""><img src="images/banners/sp-1.jpg" class="img-fluid"></a>
							<figcaption>
								<?php if($i%2 == 1){  ?>
								<span class="premium"></span>
								<?php } ?>
								<h3 class="clip-text16"><a href="">Lootere: Bandits Of British India Season 2</a></h3>
								<span class="duration"> 30 Mins </span>
								<p class="">Celebrate this Onam by treating your family and friends with this mouthwatering dish. Follow Sakshi Tanwar's step by step recipe of Kalan and let us know how it turns out!</p>
								<div class="prog-bar"><span class="prog-d" style="width:40%"></span></div>
							</figcaption>
							<span class="coming-soon">Coming Soon</span><span class="new">New</span><span class="play-icon"></span>
						</figure>
						<?php } ?>	
					</div>
				</div>
				<div class="scroller"><span class="thumb"></span></div>
			</div>
			<div class="row home-footer align-items-center">
				<div class="col-6 text-center store-links">
					<p>Catch Up with new episodes <br>EXCLUSIVELY on our app</p>
					<a href=""><img src="images/app-store.png" /></a>
					<a href=""><img src="images/play-store.png" /></a>
				</div>
				<div class="col-6 text-center">
					<img src="images/mobile-app-ss.png" />
				</div>
			</div>	
		</div>
	</div>
<?php include "footer.php";