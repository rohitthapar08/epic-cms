	<footer>
		<div class="uk-container">
			<nav class="uk-navbar-container uk-navbar-transparent" uk-navbar="mode: click">
				<div class="logo uk-navbar-left">
					<a href="/"><img src="img/epic-on-logo.png" alt="Logo"></a>
				</div>
				<div class="uk-navbar-left footer-menu">
					<ul class="uk-navbar-nav">
						<li><a href="index.php">About Us</a></li>
						<li><a href="">Terms of Use</a></li>
						<li><a href="">Privacy Policy</a></li>
						<li><a href="">Support</a></li>
					</ul>
				</div>
				<div class="uk-navbar-right">
					<div class="footer-search">
						<div class="fs-wrap">
							<input class="uk-input" type="" name="" placeholder="Subscribe for Newsletter">
							<a href="" class="uk-button">Submit</a>
						</div>
					</div>
					<div class="footer-social">
						<span>Follow Us</span>
						<a href=""><i class="fab fa-facebook-f"></i></a>
						<a href=""><i class="fab fa-twitter"></i></a>
						<a href=""><i class="fab fa-google-plus-g"></i></a>
						<a href=""><i class="fab fa-youtube"></i></a>
						<a href=""><i class="fab fa-instagram"></i></a>
						<a href=""><i class="fab fa-linkedin-in"></i></a>
					</div>
				</div>
			</nav>
		</div>
	</footer>
	<section>
		<div class="uk-container">
			<div class="copyright uk-text-center">
				<p>© <?php echo date("Y"); ?> Epic Television Networks Private Limited. All Rights Reserved.</p>
			</div>
		</div>
	</section>


	<!--Show Search PopUp-->
	<div class="show-search" id="modal-example" uk-modal bg-close="false">
		<div class="uk-container uk-container-small">
			<div uk-grid>
				<div class="uk-width-2-3">
					<input class="uk-input" type="text" name="search" placeholder="Search Epic Content">
					<ul class="show-response">
						<li>
							<a href="">Tyohaar Ki Thaali</a>
						</li>
						<li>
							<a href="">Tyohaar Ki Thaali Recipe Special</a>
						</li>
						<li>
							<a href="">Sakshi Tanvar Makes Kalan For Onam | #Onam Special</a>
						</li>
						<li>
							<a href="">Sakshi Tanvar Makes Modaks For Ganeshji | #Ganesh Special</a>
						</li>
					</ul>
				</div>
				<div class="uk-width-1-3">
					<div class="custom-select">
						<select>
							<option>All Genres</option>
		                	<option>Sports</option>
		                	<option>History</option>
		                	<option>Culture</option>
		                	<option>Entertainment</option>
		                	<option>Science</option>
						</select>
					</div>
					<a href="#" class="show-search-btn"><img src="img/show-search.png" alt=""></a>
				</div>
			</div>
		</div>
	</div>

	</div>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.11/js/uikit.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.10/js/uikit-icons.min.js"></script>
		<!--Menu-->
		<script type="text/javascript">
			$(document).ready(function(){			    
			    $(".user-name").click(function () {
			    	$(".user-login").toggleClass("show");
				});
				$(".search-btn").click(function () {
			    	$(this).toggleClass("openmodal")
				});
				$(".promo-share-btn").click(function () {
			    	$(this).next(".promo-share").toggleClass("show");
			    	e.preventDefault();
				});
				$(".more-less").click(function () {
			    	$(this).prev(".spt-details p").toggleClass("complete");
			    	$(this).text(function(i, v){
		               return v === 'Read More +' ? 'Read Less -' : 'Read More +'
		            })
				});
			});
		</script>
		<script>
			var acc = document.getElementsByClassName("accordion");
			var i;
			
			for (i = 0; i < acc.length; i++) {
			  acc[i].addEventListener("click", function() {
			    this.classList.toggle("active");
			    var panel = this.nextElementSibling;
			    if (panel.style.maxHeight){
			      panel.style.maxHeight = null;
			    } else {
			      panel.style.maxHeight = panel.scrollHeight + "px";
			    } 
			  });
			}
		</script>

		<!--Custom Drop Down-->
		<script>
		var x, i, j, selElmnt, a, b, c;
		/*look for any elements with the class "custom-select":*/
		x = document.getElementsByClassName("custom-select");
		for (i = 0; i < x.length; i++) {
		  selElmnt = x[i].getElementsByTagName("select")[0];
		  /*for each element, create a new DIV that will act as the selected item:*/
		  a = document.createElement("DIV");
		  a.setAttribute("class", "select-selected");
		  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
		  x[i].appendChild(a);
		  /*for each element, create a new DIV that will contain the option list:*/
		  b = document.createElement("DIV");
		  b.setAttribute("class", "select-items select-hide");
		  for (j = 0; j < selElmnt.length; j++) {
		    /*for each option in the original select element,
		    create a new DIV that will act as an option item:*/
		    c = document.createElement("DIV");
		    c.innerHTML = selElmnt.options[j].innerHTML;
		    c.addEventListener("click", function(e) {
		        /*when an item is clicked, update the original select box,
		        and the selected item:*/
		        var y, i, k, s, h;
		        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
		        h = this.parentNode.previousSibling;
		        for (i = 0; i < s.length; i++) {
		          if (s.options[i].innerHTML == this.innerHTML) {
		            s.selectedIndex = i;
		            h.innerHTML = this.innerHTML;
		            y = this.parentNode.getElementsByClassName("same-as-selected");
		            for (k = 0; k < y.length; k++) {
		              y[k].removeAttribute("class");
		            }
		            this.setAttribute("class", "same-as-selected");
		            break;
		          }
		        }
		        h.click();
		    });
		    b.appendChild(c);
		  }
		  x[i].appendChild(b);
		  a.addEventListener("click", function(e) {
		      /*when the select box is clicked, close any other select boxes,
		      and open/close the current select box:*/
		      e.stopPropagation();
		      closeAllSelect(this);
		      this.nextSibling.classList.toggle("select-hide");
		      this.classList.toggle("select-arrow-active");
		    });
		}
		function closeAllSelect(elmnt) {
		  /*a function that will close all select boxes in the document,
		  except the current select box:*/
		  var x, y, i, arrNo = [];
		  x = document.getElementsByClassName("select-items");
		  y = document.getElementsByClassName("select-selected");
		  for (i = 0; i < y.length; i++) {
		    if (elmnt == y[i]) {
		      arrNo.push(i)
		    } else {
		      y[i].classList.remove("select-arrow-active");
		    }
		  }
		  for (i = 0; i < x.length; i++) {
		    if (arrNo.indexOf(i)) {
		      x[i].classList.add("select-hide");
		    }
		  }
		}
		/*if the user clicks anywhere outside the select box,
		then close all select boxes:*/
		document.addEventListener("click", closeAllSelect);
		</script>
		
		<script src="js/owl.carousel.min.js"></script>
		<script type="text/javascript">
			$('.main-banner').owlCarousel({
				center: true,
			    loop:true,
			    margin:10,
			    nav:true,
			    dots:true,
			    autoplay:false,
			    autoplaySpeed:4000,
			    autoplaySpeed:2000,
			    items:1,
			    stagePadding: 155
			})
			$('.cs-trend').owlCarousel({
			    loop:true,
			    margin:0,
			    nav:false,
			    dots:true,
			    autoplay:false,
			    autoplaySpeed:4000,
			    autoplaySpeed:2000,
			    items:4,
			    margin:18
			})
			$('.cs-recent').owlCarousel({
			    loop:true,
			    margin:0,
			    nav:true,
			    dots:false,
			    autoplay:false,
			    autoplaySpeed:4000,
			    autoplaySpeed:2000,
			    items:4,
			    margin:18
			})
			$('.promo-slider').owlCarousel({
				center: true,
			    loop:false,
			    margin:0,
			    nav:true,
			    dots:true,
			    autoplay:false,
			    autoplaySpeed:4000,
			    autoplaySpeed:2000,
			    items:3,
			    autoHeight: false,
    autoHeightClass: 'owl-height'
			})
		</script>
		<script type="text/javascript">
		$('a[href*="#"]:not([href="#"])').click(function() {
		  if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
		    var target = $(this.hash);
		    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		    if (target.length) {
		      $('html, body').animate({
		        scrollTop: target.offset().top
		      }, 1000);
		      return false;
		    }
		  }
		});
		</script>

		<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
		<script type="text/javascript">
			(function($){
		        $(window).on("load",function(){
		            $(".customscroll").mCustomScrollbar({
		            	axis:"x",
		            	advanced:{autoExpandHorizontalScroll:true}
		            });
		        });
		    })(jQuery);
		</script>


		<!-- <script type="text/javascript" src="js/readmore.js"></script>
		<script type="text/javascript">
			$('.spt-inner').readmore({
				speed: 500,
				collapsedHeight: 44,
				heightMargin: 16,
				moreLink: '<a href="#" class="moreless">Read More +</a>',
				lessLink: '<a href="#" class="moreless">Read Less -</a>',
				embedCSS: true,
				blockCSS: 'overflow: hidden',
				startOpen: false,

				blockProcessed: function() {},
				beforeToggle: function(){},
				afterToggle: function(){}
			});
		</script> -->
	</body>
</html>