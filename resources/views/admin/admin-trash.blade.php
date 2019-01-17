@include('admin.admin-header')
                <div class="row" style="margin-top:2%;">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Trash Content</h3>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Content Title</th>
                                            <th>Content Type</th>
                                            <th>Publish Date</th>
                                            <th>Author</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($trash_data as $content)
                                        <tr class="trash-row">
                                            <td>{{$content->ID}}</td>
                                            <td>{{$content->content_title}}</td>
                                            <td>{{$content->content_type}}</td>
                                            <td>{{$content->created_on}}</td>
                                            <td>{{$content->created_by}}</td>
                                            <td class="text-nowrap">
                                                    <i class="fa fa-recycle text-success m-r-10 restore_trash" data-content-id="{{$content->ID}}" data-toggle="tooltip" data-original-title="Restore Content"></i> 
                                                    <i class="fa fa-trash-o text-danger delete_trash" data-content-id="{{$content->ID}}" data-toggle="tooltip" data-original-title="Delete Permanently"></i>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>      
@include('admin.admin-footer')