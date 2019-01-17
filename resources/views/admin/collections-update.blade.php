@include('admin.admin-header')
                <div class="row" style="margin-top: 2%;">
                            <h1>Add New Collection</h1>
                                <!-- Content Title -->
                                <form method="post" action="{{action('CollectionsController@upload_methods')}}">
                                    {{ csrf_field() }}
                                @if (!empty($data[0]))
                                <input name="collection_id" type="hidden" value="{{$data[0][0]}}">
                                <div class="col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="collection_name" value="{{$data[0][1]}}">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                	<div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control collection-form-dd" name="type" id="collection-type-dd">
                                            @if ($data[0][2] == 0)
                                            <option value="0">Auto-Generated</option>
                                            <option value="1">Manual</option>
                                            @else
                                            <option value="1">Manual</option>
                                            <option value="0">Auto-Generated</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Order</label>
                                        <input type="text" class="form-control" name="collection_order" value="{{$data[0][3]}}">
                                    </div>
                                </div>
                                @endif
                                @if (!empty($data[1]))
                                <div id="collection-content-wrap" style="">
                                    <ul id="sortable" style="list-style:none;">
                                        @foreach ($data[1] as $val)
                                        <li class="ui-state-default">
                                            <div class="collection-content-area" style="overflow:hidden;border: 1px solid #e4e7ea;background-color:white;">
                                                <div class="col-sm-12 col-xs-12"><i class="fa fa-minus-square delete-content-appened" style="float:right;margin-top:2%;color:red;cursor:pointer;"></i></div>
                                                <div class="col-sm-6 col-xs-12">
                                                    <!-- collection data row id -->
                                                    <input type="hidden" name="row_id[]" value="{{$val[0]}}">
                                                   <div class="form-group">
                                                        <label>Content Type</label>
                                                        <select class="form-control content-type-dd" name="old_content_type[]">
                                                            @if ($val[2] == 'Collection')
                                                            <option>Collection</option>
                                                            <option>Content</option>
                                                            @else
                                                            <option>Content</option>
                                                            <option>Collection</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Content ID</label>
                                                        <input type="text" class="form-control content-type-id" name="old_content_id[]" value="{{$val[3]}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <a class="btn btn-danger" id="collection-append-content">Add More +</a>
                                </div>
                                @else
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
                                @endif
                                    <input type="submit" name="update_collection" value="Update" class="btn btn-info" style="float:right;margin-top:3%;">
                        </form>
                </div>
        
@include('admin.admin-footer')