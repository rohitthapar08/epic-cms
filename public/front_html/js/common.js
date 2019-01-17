/* Start Top Banner JS */
if($(".banner-cont").length > 0){
	var bw = $(document).outerWidth();
	$(".bg-ban").css("width",bw+"px");
	$(".banner-outer").css("width",bw+"px");
	var lm = $(".banner-wrapper").offset().left;
	$(".banner-outer").css("margin-left","-"+lm+"px");
	var lst_slider = $(".banner-slider .slide").last().clone().addClass("clone");
	$(".banner-slider").prepend(lst_slider);
	var fst_slider = $(".banner-slider .slide").first().clone().addClass("clone");
	$(".banner-slider").append(fst_slider);
	var count = $(".banner-slider .slide").length;
	for (var i =2; i < count; i++) {
		$(".banner-dots").append('<span class="dot"></span>');
	}
	$(".banner-dots .dot").first().addClass("active");
	var width = 1290*count;
	var ml = 1290-lm;
	var oml = ml;
	$(".banner-slider").css("width",width+"px");
	$(".banner-slider").css("margin-left","-"+ml+"px");
	$("a.prev").hide();
	$("a.next").click(function(){
		$("a.prev").show();
		var nml = ml+1290;
		ml = nml;
		$(".banner-slider .slide.active").next(".slide").addClass("active");
			
			if($(".banner-slider .slide.active").next(".slide").hasClass("clone")){
			$("a.next").hide();
			}
		$(".banner-slider").animate({"margin-left":"-"+nml+"px"},1000,function(){
			$(".banner-slider .slide.active").first().removeClass("active");
			$(".banner-dots .dot.active").removeClass('active').next(".dot").addClass("active");
		});
		
	});
	$("a.prev").click(function(){
		$("a.next").show();
		var nml = ml-1290;
		ml = nml;
		$(".banner-slider .slide.active").prev(".slide").addClass("active");
			
			if($(".banner-slider .slide.active").prev(".slide").hasClass("clone")){
				$("a.prev").hide();
			}
		$(".banner-slider").animate({"margin-left":"-"+nml+"px"},1000,function(){
			$(".banner-slider .slide.active").last().removeClass("active");
			$(".banner-dots .dot.active").removeClass('active').prev(".dot").addClass("active");
		});
		
	});
	// var interval = setInterval(autoScroll,5000);
	// $(".banner-wrapper").mousemove(function(){clearInterval(interval);})
	// $(".banner-wrapper").mouseout(function(){interval = setInterval(autoScroll,5000);})
	function autoScroll()
	{
		if($(".banner-slider .slide.active").next(".slide").hasClass("clone")){
			ml = oml;
			$(".banner-slider").animate({"margin-left":"-"+oml+"px"},1000,function(){
				
				
			});
			$(".banner-slider .slide").removeClass('active');
				$(".banner-slider .slide").first().next().addClass("active");
				$(".banner-dots .dot").removeClass('active')
				$(".banner-dots .dot").first().addClass("active");
				$("a.prev").hide();
				$("a.next").show();		
		}else{
			$("a.prev").show();
			var nml = ml+1290;
			ml = nml;
			$(".banner-slider .slide.active").next(".slide").addClass("active");
				$(".banner-dots .dot.active").removeClass('active').next(".dot").addClass("active");
				if($(".banner-slider .slide.active").next(".slide").hasClass("clone")){
				$("a.next").hide();
				}
			$(".banner-slider").animate({"margin-left":"-"+nml+"px"},1000,function(){
				$(".banner-slider .slide.active").first().removeClass("active");	
				
			});
		}
		
	}
}
/* End Top Banner JS */
$(document).ready(function(){
	$(".tray-row.wsc .tray-wrap").each(function(){
		var wid = 0;
		$(this).find("figure").each(function(){
			wid = wid + $(this).outerWidth();
			wid = wid+25;
		})
		wid = wid-25;
		$(this).css("width",wid+"px");
	});
	$(".tray-row.wsc").each(function(){
		if($(this).find(".tray").outerWidth() >= $(this).find(".tray-wrap").outerWidth()){
			$(this).find(".scroller").hide();
		}
	});
	$( ".tray-row.wsc .scroller .thumb" ).draggable({ containment: "parent",axis: "x",drag: function() {
        var le = $(this).position().left;
        if(le>$(this).width()){
        	le = le + +$(this).width();
        }
        var wi = $(this).parent().width();
        var pe = le*100/wi;
        console.log(pe);
        var wr_wi = $(this).parents(".tray-row").find(".tray-wrap").width()-$(this).parents(".tray-row").find(".tray").width();
        console.log(wr_wi);
        var awi = wr_wi*pe/100;
        console.log(awi);
        $(this).parents(".tray-row").find(".tray").scrollLeft(awi);
     }});
});

(function($){
$(window).load(function(){
	$("body").mCustomScrollbar({
		scrollInertia:700
	});
});
})(jQuery);