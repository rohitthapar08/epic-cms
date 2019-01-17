@include('admin.admin-header')
 <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Add New Content</div>
                            <div class="col-12">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                            @if (!empty($nav) )
                                               @foreach ($nav as $breadcrumb)
                                               <li>{{$breadcrumb}}</li>
                                               @endforeach
                                            @endif
                                    </ol>
                                </nav>
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <div class="row">
                                        <form method="post" action="{{action('AdminContentController@new_content_with_params')}}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="catalog_id" value="{{$_GET['catalog_id']}}">
                                        @if ($_GET['parent_id'] != 0)
                                        <input type="hidden" name="parent_ID" value="{{$_GET['parent_id']}}">
                                        @else
                                        <input type="hidden" name="parent_ID" value="">
                                        @endif
                                        <input type="hidden" name="parent_ID" value="{{$_GET['parent_id']}}">
                                        <!-- LHS Area -->
                                        <div class="col-md-8">
                                            <!-- Content Title -->
                                            <div class="form-group">
                                                <label>Content Title</label>
                                                <input type="text" class="form-control" name="content_title">
                                            </div>

                                            <!-- Content Description -->
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="8" class="form-control" name="content_description"></textarea>
                                             </div>

                                             <!-- Short Description -->
                                             <div class="form-group">
                                                <label>Short Description</label>
                                                <textarea rows="4" class="form-control" name="content_excerpt"></textarea> 
                                            </div>

                                            <!-- Publish Start Date -->
                                            <div class="form-group">
                                                <label class="control-label">Publish Start Date</label>
                                                <input type="datetime-local" class="form-control input-daterange-timepicker" name="publish_start_date" value="2018-07-11T00:59:00">
                                            </div>

                                            <!-- Publish End Date -->
                                            <div class="form-group">
                                                <label class="control-label">Publish End Date</label>
                                                <input type="datetime-local" class="form-control input-daterange-timepicker" name="publish_end_date" value="2018-07-11T00:59:00">
                                            </div>

                                            <!-- Release Date -->
                                            <div class="form-group">
                                                <label class="control-label">Release Date</label>
                                                <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="release_date" value="2018-07-11"> 
                                            </div>

                                            <!-- Age Limit -->
                                            <div class="form-group">
                                                <label>Rating / Age Limit</label>
                                                <select class="form-control" name="content_rating">
                                                    <option>G</option>
                                                    <option>M</option>
                                                    <option>PG</option>
                                                    <option>A</option>
                                                </select>
                                            </div>

                                            <!-- Tags -->
                                            <div class="form-group">
                                                <label>Tags</label>
                                                <input type="text" class="form-control" name="content_tags" value="history,friction,devotional,drama">
                                                <p>comma seperated values</p>
                                            </div>

                                            <!-- Video URL -->
                                            <div class="form-group">
                                                <label>Video URL</label>
                                                <input type="text" class="form-control" name="content_video_url" value="www.google.com">
                                            </div>

                                            <!-- Free / Premium -->
                                            <div class="form-group" style="padding: 2%;border: dashed 1px lightgrey;">
                                                <label class="control-label">Availability</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline p-0">
                                                        <div class="radio radio-info">
                                                            <input type="radio" id="avail1" value="1" name="content_availbility">
                                                            <label for="avail1">Premium</label>
                                                        </div>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <div class="radio radio-info">
                                                            <input type="radio" id="avail2" value="0" name="content_availbility" checked>
                                                            <label for="avail2">Free</label>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Login Check -->
                                            <div class="form-group" style="padding: 2%;border: dashed 1px lightgrey;">
                                                <label class="control-label">Login Required</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline p-0">
                                                        <div class="radio radio-info">
                                                            <input type="radio" id="login1" value="1" name="content_access">
                                                            <label for="login1">Yes</label>
                                                        </div>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <div class="radio radio-info">
                                                            <input type="radio" id="login2" value="0" name="content_access" checked>
                                                            <label for="login2">No</label>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Cast -N- Crew -->
                                            <div class="form-group" style="padding: 2%;border: dashed 1px lightgrey;">
                                                    <label for="input-file-now">Cast and Crew</label>
                                                    <input type="file" name="cast_and_crew_file" onchange="upload(this.files[0])">
                                                    <div class="csv-data-display" style="display:none;"><p>Uploaded .csv Data</p></div>
                                                    <a class="csv-data-toggle"><i class="mdi mdi-eye" id=""> Show Data</i></a>
                                            </div>

                                        </div>
                                        <!-- /LHS -->
                                        <!-- RHS Area -->
                                        <div class="col-md-4">

                                            <!-- Platforms -->
                                            <div class="form-group">
                                                <label>Platforms</label>
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox3" type="checkbox" checked="" name="content_platform[]" value="android">
                                                        <label for="checkbox3"> Android </label>
                                                    </div>
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox4" type="checkbox" checked="" name="content_platform[]" value="ios">
                                                        <label for="checkbox4"> IOS </label>
                                                    </div>
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox5" type="checkbox" checked="" name="content_platform[]" value="web">
                                                        <label for="checkbox5"> Web </label>
                                                    </div>
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox6" type="checkbox" checked="" name="content_platform[]" value="fire-tv">
                                                        <label for="checkbox6"> FireTV </label>
                                                    </div>
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox7" type="checkbox" checked="" name="content_platform[]" value="roku">
                                                        <label for="checkbox7"> Roku </label>
                                                    </div>
                                                    <div class="checkbox checkbox-info">
                                                        <input id="checkbox8" type="checkbox" checked="" name="content_platform[]" value="apple-tv">
                                                        <label for="checkbox8"> Apple TV </label>
                                                    </div>
                                            </div>

                                            <!-- Genre -->
                                            <div class="form-group">
                                                <label>Genres</label>
                                                    @foreach(\App\Catalogs::where('type','genre')->get() as $genre_item)
                                                    <div class="checkbox checkbox-info">
                                                        <input id="check-genre-{{$genre_item->ID}}" type="checkbox" checked="" name="content_genre[]" value="{{$genre_item->slug}}">
                                                        <label for="check-genre{{$genre_item->ID}}"> {{$genre_item->name}} </label>
                                                    </div>
                                                    @endforeach
                                            </div>

                                            <!-- Content type -->
                                            <div class="form-group">
                                                <label>Content Type</label>
                                                <select class="form-control" name="content_type">
                                                    @if ($_GET['content_type'] == 'Show')
                                                    <option>Show</option>
                                                    @elseif ($_GET['content_type'] == 'Season')
                                                    <option>Season</option>
                                                    @elseif ($_GET['content_type'] == 'Episode')
                                                    <option>Episode</option>
                                                    <option>Promo</option>
                                                    <option>Standalone</option>
                                                    @endif
                                                </select>
                                            </div>

                                            <!-- language -->
                                            <div class="form-group">
                                                <label>Content Language</label>
                                                <input type="text" class="form-control" name="content_language" value="English">
                                            </div>

                                            <!-- Other Languages -->
                                            <div class="form-group">
                                                <label>Other Languages</label>
                                                <input type="text" class="form-control" name="other_languages" placeholder="Other Language ID">
                                            </div>

                                            <!-- Order -->
                                            <div class="form-group">
                                                <label>Order</label>
                                                <input type="text" class="form-control" name="content_order" value="2">
                                            </div>

                                            <!-- featured image -->
                                            <div class="form-group">
                                                    <label for="input-file-now">Featured Image</label>
                                                    <input type="file" class="dropify" name="post_thumbnail">
                                            </div>

                                             <!-- Regions -->
                                             <div class="form-group">
                                                <label>Regions</label>
                                                <select class="form-control" name="content_region">
                                                    <option>India</option>
                                                    <option>Overseas</option>
                                                    <option>Allover</option>
                                                </select>
                                            </div>
                                            

                                             <!-- Status -->
                                            <div class="form-group" style="padding: 2%;border: dashed 1px lightgrey;">
                                                <label class="control-label">Status</label>
                                                <div class="radio-list">
                                                    <label class="radio-inline p-0">
                                                        <div class="radio radio-info">
                                                            <input type="radio" id="status1" value="1" name="content_status" checked>
                                                            <label for="status1">Active</label>
                                                        </div>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <div class="radio radio-info">
                                                            <input type="radio" id="status2" value="0" name="content_status">
                                                            <label for="status2">Inactive</label>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /RHS -->
                                        <div class="col-md-8">
                                            <input type="submit" name="publish_content" value="Upload" class="btn btn-info">
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    function csvJSON(csv){
                          var lines=csv.split("\n");
                          var result = '<table style="width:100%;">'; 
                          for(var i=0;i<lines.length;i++){
                            result += '<tr>';
                              var currentline=lines[i].split(",");
                              for(var j=0;j<currentline.length;j++){
                                if (i == 0) {
                                    result += '<th>'+currentline[j]+'</th>';
                                } else {
                                    result += '<td>'+currentline[j]+'</td>';
                                };
                              }
                              result += '</tr>';                                
                          }
                          result += '</table>';
                          return result; 
                        }
                    function upload(file) {
                            if( file.type.match(/text\/csv/) || file.type.match(/vnd\.ms-excel/) ){
                                oFReader = new FileReader();
                                oFReader.onloadend = function() {
                                    var json = csvJSON(this.result);
                                    $('.csv-data-display').html(json);
                                };
                                oFReader.readAsText(file);
                            } else {
                                console.log("This file does not seem to be a CSV.");
                            }
                        }
                </script>
@include('admin.admin-footer')