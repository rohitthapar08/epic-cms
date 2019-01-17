<?php $page = "tvshows"; include "header.php" ?>
	<div class="container-fluid no-banner">
		<div class="container">
			<?php $arr = array("History");
				foreach($arr as $a){
					$k=20;
					$class="new";
					if($a == "History"){ $k=20; $class="new"; }
					if($a == "Food") { $k=4; $class="coming-soon"; }
					if($a == "Fiction") { $k=3; }
					if($a == "Travel") { $k=5; }
			 ?>
			
			<div class="row tray-row <?php echo $a=='Continue Watching'?'prog-bar':''; ?>">
				<div class="col-12">
					<h2><?php echo $a; ?></h2>
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
			</div>

		<?php } ?>
		</div>
	</div>
<?php include "footer.php";