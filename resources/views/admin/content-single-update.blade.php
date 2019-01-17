@include('admin.admin-header')
                <div class="row">
                    <div class="col-md-12" style="margin-top:2%;">
                        <div class="panel panel-info">
                            <div class="panel-heading"></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                        <div class="form-body">
							                <h3 class="box-title">Update Content</h3>
                                            <hr>
										<form method="post" action="{{action('AdminContentController@updateContent',[$content_data[0]->content_type,$content_data[0]->ID])}}">
                                    		{{ csrf_field() }}
                                    		<input type="hidden" name="content_id" value="{{$content_data[0]->ID}}">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Content Title</label>
                                                        <input class="form-control" type="text" name="content_title" value="{{$content_data[0]->content_title}}" required> <span class="help-block">Headline for the content</span></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Slug</label>
                                                        <input class="form-control" type="text" name="content_slug" value="{{$content_data[0]->content_slug}}">
                                                        <span class="help-block">Slug for the post</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Description</label>
                                                        <textarea class="textarea_editor form-control" rows="15" name="content_description">{{$content_data[0]->content_description}}</textarea>
                                                         <span class="help-block">Content Description</span> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    	<div class="form-group">
                                                        <label class="control-label">Category</label>
                                                        <input class="form-control" type="text" name="content_category"  value="{{$content_data[0]->content_type}}" required>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Status</label>
                                                        <select name="content_status" value="" class="form-control">
                                                            <option>Publish</option>
									                        <option>Draft</option>
                                                            <option>Trash</option>
                                                        </select> <span class="help-block"> <i>whether to save in draft or publish</i> </span> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                     <div class="form-group">
                                                        <label class="control-label">Parent</label>
                                                        <input class="form-control" type="text" name="content_parent"  value="{{$content_data[0]->content_parent}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label">Order</label>
                                                        <input class="form-control" type="text" name="content_order"  value="{{$content_data[0]->content_order}}"> 
                                                        <span class="help-block">Content order </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Excerpt</label>
                                                        <textarea class="textarea_editor form-control" rows="4" name="content_excerpt">{{$content_data[0]->content_excerpt}}</textarea>
                                                         <span class="help-block">Content Excerpt</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                 <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Content Video URL</label>
                                                        <input class="form-control" type="text" name="content_video_url" value="{{$content_data[0]->content_video_url}}" required> 
                                                        <span class="help-block">Main Video URL of the Content</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Content Trailer URL</label>
                                                        <input class="form-control" type="text" name="content_trailer_url" value="{{$content_data[0]->content_trailer_url}}" required> 
                                                        <span class="help-block">Trailer URL for the Content</span>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="form-actions">
                                        	<input type="submit" name="content_pg_update" value="Update Content" class="btn btn-info">
                                            <input type="submit" name="content_pg_delete" value="Delete" class="btn btn-danger">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@include('admin.admin-footer')