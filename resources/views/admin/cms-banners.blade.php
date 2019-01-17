@include('admin.admin-header')
                <div class="row" style="margin-top:2%;">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Banners</h3>
                            <button data-toggle="modal" data-target="#responsive-modal" class="model_img img-responsive btn btn-primary">Add New</button>
                            <div id="gallery" style="margin-top:2%;">
                                <div id="gallery-content">
                                    <div id="gallery-content-center">
                                        @if (!empty($banners))
                                        	@foreach($banners as $banner)
                                        	<div class="col-md-12 col-lg-6 banner-wrap" style="margin-top:1%;">
                                        		<img src="{{$banner->video_url}}" style="width:100%;position:relative;">
                                        		<div style="position:absolute;bottom:0;background:rgba(0,0,0,0.5);padding:1%;color:white;width:93%;">
    	                                    		<h4 style="color:white;">{{$banner->title}}</h4>
    		                                        <p>Added on : {{$banner->created_on}}</p>
    		                                        <i class="mdi-delete mdi delete_banner" style="position:absolute;top:35%;right:5%;cursor:pointer;" data-content-id="{{$banner->ID}}"></i>
    		                                    </div>
    					                    </div>
                                        	@endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Add New Banner</h4> </div>
                                        <div class="modal-body">
                                    	<form method="post" action="{{action('CMScontroller@uploadBanner')}}" enctype="multipart/form-data">
                                		 <div class="form-group">
                                            		{{csrf_field()}}
                                                    <label for="recipient-name" class="control-label">Title for Banner</label>
                                                    <input type="text" class="form-control" name="banner_title" required> </div>
		                                        	<input type="file" class="dropify" name="banner_image">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                            <input type="submit" class="btn btn-ingo" value="Add" name="add_banner">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>     
@include('admin.admin-footer')