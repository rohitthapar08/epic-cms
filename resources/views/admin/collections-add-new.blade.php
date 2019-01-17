@include('admin.admin-header')
                <div class="row" style="margin-top: 2%;">
                            <h1>Add New Collection</h1>
                                <!-- Content Title -->
                                <form method="post" action="{{action('CollectionsController@upload_collection')}}" enctype='multipart/form-data'>
                                    {{ csrf_field() }}
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="collection_name">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                	<div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control collection-form-dd" name="type" id="collection-type-dd">
                                            <option value="0">Auto-Generated</option>
                                            <option value="1">Manual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Order</label>
                                        <input type="text" class="form-control" name="collection_order">
                                    </div>
                                </div>

                                <div id="collection-content-wrap" style="">
                                    <ul id="sortable" style="list-style:none;">
                                        <li class="ui-state-default">
                                            <div class="collection-content-area" style="overflow:hidden;border: 1px solid #e4e7ea;background-color:white;">
                                                <div class="col-sm-12 col-xs-12"><i class="fa fa-minus-square delete-content-appened" style="float:right;margin-top:2%;color:red;cursor:pointer;"></i></div>
                                                <div class="col-sm-6 col-xs-12">
                                                   <div class="form-group">
                                                        <label>Content Type</label>
                                                        <select class="form-control content-type-dd" name="content_type[]">
                                                            <option>Collection</option>
                                                            <option>Content</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Content ID</label>
                                                        <input type="text" class="form-control content-type-id" name="content_id[]">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <a class="btn btn-danger" id="collection-append-content">Add More +</a>
                                </div>
                                    <input type="submit" name="add_collection" value="Upload" class="btn btn-info" style="float:right;margin-top:3%;">
                        </form>
                </div>
        
@include('admin.admin-footer')