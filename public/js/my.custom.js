jQuery(document).ready(function($){

	//content from search to entry section
	$(document).on("click",".hotspot_add_content", function(){
     	$(this).closest('.media').fadeOut(500);
		var appendHTML = $(this).closest('.media').html();
		var modifiedHTML = appendHTML.replace('<button class="btn btn-danger hotspot_add_content" style="float:right;">Add</button>','<button class="btn btn-danger hotspot_delete_content" style="float:right;">Delete</button>');
		$('.append-media').prepend('<div class="media">'+modifiedHTML+'</div>');
  	});

	//show content on dropdown action
	$('.hotspot-list-ddpp').on('change', function (e) {
	    var valueSelected = this.value;
	    if (valueSelected.length == 0) {
	    	$('.append-media').html('');
		} else {
		    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
		        url: "/cms/hotspots/",
		        type:"POST",
		        data: { hotspot_id: valueSelected,_token: CSRF_TOKEN},
		        success:function(request){
		            $('.append-media').html(request);
		        },
		        error:function(){
		            console.log("No data returned first");
		        }
	    	});
		}
		
	});

	//update hotspot contents
	$('.hotspot_update_btn').click(function(){
		var content_ids = $(".append-media").find("input[name='hidden_content_id[]']").map(function(){return $(this).val();}).get();
		var hotSpot_call_ID = $(".hotspot-list-ddpp").val();
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
	        url: "/cms/hotspots/",
	        type:"POST",
	        data: { content_ids: content_ids,hotSpot_call_ID: hotSpot_call_ID,_token: CSRF_TOKEN},
	        success:function(request){
	            alert(request);
	        },
	        error:function(){
	            console.log("No data returned second");
	        }
    	});
	});

	//delete button
	$(document).on("click",".hotspot_delete_content", function(){  
     	$(this).closest('.media').remove();
  	});

	//search content
	$('.search_content_btn').click(function(){
		var search_term = $('.hotspot_search').val();
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
	        url: "/cms/hotspots/",
	        type:"POST",
	        data: { search_term: search_term,_token: CSRF_TOKEN},
	        success:function(check){
	           $('.search_content').html(check);
	        },
	        error:function(){
	            console.log("no search data");
	        }
    	});
	});


	//restore content
	$('.restore_trash').click(function(){
		var restore_id = $(this).data("content-id");
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
	        url: "/trash/",
	        type:"POST",
	        data: { restore_id: restore_id,_token: CSRF_TOKEN},
	        success:function(restore){
	           
	        },
	        error:function(){
	            console.log("no search data");
	        }
    	});
    	$(this).closest('.trash-row').fadeOut(500);
	});

	//delete trash
	$('.delete_trash').click(function(){
		var delete_id = $(this).data("content-id");
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
	        url: "/trash/",
	        type:"POST",
	        data: { delete_id: delete_id,_token: CSRF_TOKEN},
	        success:function(restore){
	           
	        },
	        error:function(){
	            console.log("no search data");
	        }
    	});
    	$(this).closest('.trash-row').fadeOut(500);
	});

	//delete banner
	$('.delete_banner').click(function(){
		var delBanner = $(this).data("content-id");
		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		$.ajax({
	        url: "/cms/banners/",
	        type:"POST",
	        data: { delBanner: delBanner,_token: CSRF_TOKEN},
	        success:function(banner){
	           alert('Banner moved to Recycle.');
	        },
	        error:function(){
	            console.log("Can't Delete Banner");
	        }
    	});
		$(this).closest('.banner-wrap').fadeOut(500);
	});
	
  	//delete catalog
  	$('.delete-content').click(function(){
  		var selector = $(this);
  		var check = confirm("delete this?");
  		if (check == true) {
	  		var id = $(this).data('content-id');
	  		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
		        url: "/catalogs/",
		        type:"POST",
		        data: { delContent: id,_token: CSRF_TOKEN},
		        success:function(success){
		        	$(selector).closest('tr').hide();
		        },
		        error:function(){
		            console.log("something is wrong");
		        }
	    	});
		};
  	});
  	//delete catalog type
  	$('.delete-content-type').click(function(){
  		var selector = $(this);
  		var catalogID = selector.data('catalog-id');
  		var count = selector.data('count');  		  		

  		var check = confirm("You have data "+count+" records, sure you want to delete?");
  		if (check == true) {
	  		
	  		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
		        url: "/catalog-type/catalog",
		        type:"POST",
		        data: { delete_cat_id: catalogID,_token: CSRF_TOKEN},
		        success:function(success){
		        	$(selector).closest('tr').remove();
		        },
		        error:function(){
		            console.log("something is wrong");
		        }
	    	});
		};
  	});



    $(document).ready(function(){
       	var urlParams = new URLSearchParams(window.location.search);
        var cat = urlParams.get('catalog_id');
        if(cat == 1){
        	$('.side-cat').addClass('active');
        	$('.side-cat').find('nav').addClass('collapse in');
        	$('.side-cat .nav li:first-child a').addClass('active');
        }
        if(cat == 2){
        	$('.side-cat').addClass('active');
        	$('.side-cat').find('nav').addClass('collapse in');
        	$('.side-cat .nav li:nth-child(2) a').addClass('active');
        }
        if(cat == 3){
        	$('.side-cat').addClass('active');
        	$('.side-cat').find('nav').addClass('collapse in');
        	$('.side-cat .nav li:nth-child(3) a').addClass('active');
        }
        if(cat == 4){
        	$('.side-cat').addClass('active');
        	$('.side-cat').find('nav').addClass('collapse in');
        	$('.side-cat .nav li:nth-child(4) a').addClass('active');
        }
    });

});

