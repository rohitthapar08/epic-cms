@include('admin.admin-header')
                <div class="row">
                    <div class="col-md-12" style="margin-top:2%;">
                        <div class="panel panel-info">
                            <div class="panel-heading"></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                        <div class="form-body">
							                <h3 class="box-title">Add New Content</h3>
                                            <hr>
										<form method="post" action="{{action('AdminContentController@addNewContent',$category_name)}}">
                                    		{{ csrf_field() }}
                                    		<input type="hidden" name="user_id" value="{{\Auth::user()->ID}}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Content Title</label>
                                                        <input class="form-control" type="text" name="content_title" value="" required> <span class="help-block">Headline for the content</span></div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Description</label>
                                                        <textarea class="textarea_editor form-control" rows="15" name="content_description"></textarea> <span class="help-block">Content Description</span> </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<div class="form-group">
                                                        <label class="control-label">Category</label>
                                                        <input class="form-control" type="text" name="content_category" value="{{$category_name}}" required>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Status</label>
                                                        <select name="content_status" value="" class="form-control">
                                                            <option value="publish">Publish</option>
									                        <option value="draft">Draft</option>
                                                        </select> <span class="help-block"> <i>whether to save in draft or publish</i> </span> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                     <div class="form-group">
                                                        <label class="control-label">Parent</label>
                                                        <input class="form-control" type="text" name="content_parent" value="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Order</label>
                                                        <input class="form-control" type="text" name="content_order" value=""> <span class="help-block">Content order </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Excerpt</label>
                                                        <textarea class="textarea_editor form-control" rows="4" name="content_excerpt"></textarea> <span class="help-block">Content Excerpt</span> </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Content Video URL</label>
                                                        <input class="form-control" type="text" name="content_video_url" value="" required> <span class="help-block">Main Video URL of the Content</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Content Trailer URL</label>
                                                        <input class="form-control" type="text" name="content_trailer_url" value="" required> <span class="help-block">Trailer URL for the Content</span>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="form-actions">
                                        	<input type="Submit" name="content_pg_submit" class="btn btn-info" value="Add Content">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@include('admin.admin-footer')