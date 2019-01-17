@include('admin.admin-header')
                                <div class="row">
                    <div class="col-md-12" style="margin-top: 2%;">
                        <div class="white-box">
                            <h3 class="box-title m-b-0">Collections</h3>
                            <a href="{{ config('globals.site_url_cms')}}collections/add_new/"><button class="btn btn-info">Add New</button></a>                            
                            <div class="scrollable">
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Order</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($data as $value)
                                            <tr>
                                                <td>{{ $value->ID }}</td>
                                                <td>{{ $value->name }}</td>
                                                @if ($value->collection_type == 0)
                                                	<td><span class="label label-success">Auto Generated</span></td>
                                                @elseif ($value->collection_type == 1)
                                                	<td><span class="label label-success">Manual</span></td>
                                                @endif
                                                <td>{{ $value->collection_order }}</td>
                                                <td>
                                                    <a href="{{ route('update.collection',array('collection_id'=>$value->ID))}}" title="Edit"><i class="mdi mdi-lead-pencil"></i></a>
                                                    <span class="delete-collection" data-content-id="{{ $value->ID }}"><i class="mdi mdi-delete-empty"></i></span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <td colspan="7">
                                                    <div class="text-right">
                                                        <ul class="pagination"> </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
@include('admin.admin-footer')