<?php $page = "specials"; include "header.php" ?>
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
			

		<div class="row tray-row specials">
				<div class="col-12 tray">
					<div class="tray-wrap">
						<?php for($i=1;$i<=120;$i++){ ?>
						<figure class="new">
							<a href=""><img src="images/banners/sp-1.jpg" class="img-fluid"></a>
							<figcaption>
								<span class="premium"></span>
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
				
			</div>
			
		</div>
	</div>
<?php include "footer.php";