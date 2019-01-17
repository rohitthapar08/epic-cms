@include('admin.admin-header')
                <div class="row">
                    <div class="col-md-12" style="margin-top: 2%;">
                        <div class="white-box">
                            <h3 class="box-title m-b-0"></h3>
                            <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        @foreach ($data['navs'] as $nav)
                                        <li><a href="{{ config('globals.site_url_cms')}}catalogs?catalog_id={{$_GET['catalog_id']}}&parent_id={{$nav[0]}}">{{$nav[1]}}
                                        </a></li>
                                        @endforeach
                                    </ol>
                                </nav>
                            </div>
                            @if (isset($data['avails']))
                                @foreach ($data['avails'] as $avail)
                                <a href="{{ route('new.content', array('catalog_id'=>$_GET['catalog_id'],'parent_id'=>$_GET['parent_id'],'content_type'=>$avail)) }}"><button class="btn btn-info">Add {{$avail}}</button></a>
                                @endforeach
                            @endif
                            <div class="scrollable">
                                <div class="table-responsive">
                                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Actions</th>
                                                <th>Category</th>
                                                <th>Author</th>
                                                <th>Publish Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ( isset($content_data) && !empty($content_data) )
                                            @foreach($content_data as $value)
                                            <tr>
                                                <td>{{ $value->ID }}</td>
                                                <td><a href="{{ route('update.content',array('content_id'=>$value->ID))}}">{{ $value->title }}</a></td>
                                                <td>
                                                    @if ($value->content_type == 'Show' || $value->content_type == 'Season')
                                                    <a href="{{ route('catalog.lists', array('catalog_id'=>$_GET['catalog_id'],'parent_id'=>$value->ID)) }}" title="View Contents"><span class="label label-info">view contents<span></a>
                                                    @endif
                                                    <span class="delete-content" data-content-id="{{ $value->ID }}"><i class="mdi mdi-delete-empty"></i></span>
                                                </td>
                                                <td><span class="label label-success">{{ $value->content_type }}
                                                </span></td>
                                                <td><?php $user = \App\Users::where('ID',$value->created_by)->get();?>
                                                    @foreach($user as $val)
                                                        {{ $val->display_name }}
                                                    @endforeach</td>
                                                <td>{{ $value->created_on }}</td>
                                            </tr>
                                            @endforeach
                                            @endif
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
                            @if (empty($content_data))
                            <h3>Nothig to show yet. Go ahead, Add some.</h3>
                            @endif
                        </div>
                    </div>
                </div>
@include('admin.admin-footer')