@include('admin.admin-header')
 <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Update Content</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <div class="row">
                                        <form method="post" action="{{action('AdminContentController@updateContent',$data['data']['content_type'],$data['data']['ID'])}}" enctype='multipart/form-data'>
                                        {{ csrf_field() }}
                                       <input type="hidden" name="content_id" value="{{$data['data']['ID']}}">
                                        <!-- LHS Area -->
                                        <div class="col-md-8">
                                            <!-- Content Title -->
                                            <div class="form-group">
                                                <label>Content Title</label>
                                                 <input class="form-control" type="text" name="content_title" value="{{$data['data']['title']}}" required> 
                                            </div>

                                            <!-- Content Description -->
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea rows="8" class="form-control" name="content_description">{{$data['data']['description']}}</textarea>
                                             </div>

                                             <!-- Short Description -->
                                             <div class="form-group">
                                                <label>Short Description</label>
                                                <textarea rows="4" class="form-control" name="short_description">{{$data['data']['short_description']}}</textarea> 
                                            </div>

                                            <!-- Publish Start Date -->
                                            <div class="form-group">
                                                <label class="control-label">Publish Start Date</label>
                                                <input type="datetime-local" class="form-control input-daterange-timepicker" name="publish_start_date" value ="{{$data['data']['publish_start_date']}}">
                                            </div>

                                            <!-- Publish End Date -->
                                            <div class="form-group">
                                                <label class="control-label">Publish End Date</label>
                                                <input type="datetime-local" class="form-control input-daterange-timepicker" name="publish_end_date" value="{{$data['data']['publish_end_date']}}"> 
                                            </div>

                                            <!-- Release Date -->
                                            <div class="form-group">
                                                <label class="control-label">Release Date</label>
                                                @if(!empty($data['data']['release_date']))
                                                <input type="text" class="form-control" placeholder="yyyy/mm/dd" name="release_date" value="{{$data['data']['release_date']}}">
                                                @else
                                                <input type="text" class="form-control" placeholder="yyyy/mm/dd" name="release_date" >
                                                @endif
                                            </div>

                                            <!-- Age Limit -->
                                            <div class="form-group">
                                                <label>Rating / Age Limit</label>
                                                <select class="form-control" name="rating">
                                                    
                                                        @if (isset($data['data']['rating']))
                                                            <option>{{$data['data']['rating']}}</option>
                                                            @if ($data['data']['rating'] != 'G')
                                                            <option>G</option>
                                                            @endif
                                                            @if($data['data']['rating'] != 'M')
                                                            <option>M</option>
                                                            @endif
                                                            @if($data['data']['rating'] != 'PG')
                                                            <option>PG</option>
                                                            @endif
                                                            @if($data['data']['rating'] != 'A')
                                                            <option>A</option>
                                                            @endif
                                                        @endif
                                                    
                                                </select>
                                            </div>

                                            <!-- Tags -->
                                            <div class="form-group">
                                                <label>Tags</label>
                                                <input type="text" class="form-control" name="tags" value="{{$data['data']['tags']}}">
                                                <p>comma seperated values</p>
                                            </div>

                                            <!-- Video URL -->
                                            <div class="form-group">
                                                <label>Video URL</label>
                                                <input type="text" class="form-control" name="content_video_url" value="{{$data['data']['video_url']}}">
                                            </div>

                                            <!-- Free / Premium -->
                                            <div class="form-group" style="padding: 2%;border: dashed 1px lightgrey;">
                                                <label class="control-label">Availability</label>
                                                <div class="radio-list">
                                                    @if($data['data']['free_premium'] == 1) 
                                                        <label class="radio-inline p-0">
                                                            <div class="radio radio-info">
                                                                <input type="radio" id="avail1" name="content_availbility" checked value="1">
                                                                <label for="avail1">Premium</label>
                                                            </div>
                                                        </label>
                                                        <label class="radio-inline">
                                                            <div class="radio radio-info">
                                                                <input type="radio" id="avail2"  name="content_availbility" value="0">
                                                                <label for="avail2">Free</label>
                                                            </div>
                                                        </label>
                                                    @else($data['data']['free_premium'] == 0) 
                                                        <label class="radio-inline p-0">
                                                            <div class="radio radio-info">
                                                                <input type="radio" id="avail1" name="content_availbility" value="1">
                                                                <label for="avail1">Premium</label>
                                                            </div>
                                                        </label>
                                                        <label class="radio-inline">
                                                            <div class="radio radio-info">
                                                                <input type="radio" id="avail2" name="content_availbility" checked value="0">
                                                                <label for="avail2">Free</label>
                                                            </div>
                                                        </label>
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Login Check -->
                                            <div class="form-group" style="padding: 2%;border: dashed 1px lightgrey;">
                                                <label class="control-label">Login Required</label>
                                                <div class="radio-list">
                                                    @if($data['data']['login_required'] == 1)
                                                        <label class="radio-inline p-0">
                                                            <div class="radio radio-info">
                                                                <input type="radio" id="login1" name="content_access" checked value="1">
                                                                <label for="login1">Yes</label>
                                                            </div>
                                                        </label>
                                                        <label class="radio-inline">
                                                            <div class="radio radio-info">
                                                                <input type="radio" id="login2" value="0" name="content_access"  value="0">
                                                                <label for="login2">No</label>
                                                            </div>
                                                        </label>
                                                     @else($data['data']['login_required'] == 0)
                                                         <label class="radio-inline p-0">
                                                            <div class="radio radio-info">
                                                                <input type="radio" id="login1"  name="content_access"  value="1">
                                                                <label for="login1">Yes</label>
                                                            </div>
                                                        </label>
                                                        <label class="radio-inline">
                                                            <div class="radio radio-info">
                                                                <input type="radio" id="login2" value="0" checked name="content_access">
                                                                <label for="login2">No</label>
                                                            </div>
                                                        </label>
                                                    @endif
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
                                                @php ($plats = ['android','ios','roku','apple-tv','fire-tv','web'])
                                                @foreach ($plats as $plat)
                                                    @if (is_array($data['platform']))
                                                        @if (in_array($plat,$data['platform']))
                                                        <div class="checkbox checkbox-info">
                                                            <input id="checkbox3" type="checkbox" checked="" name="content_platform[]" value="{{$plat}}">
                                                            <label for="checkbox3"> {{ucfirst($plat)}} </label>
                                                        </div>
                                                        @else
                                                        <div class="checkbox checkbox-info">
                                                            <input id="checkbox3" type="checkbox" name="content_platform[]" value="{{$plat}}">
                                                            <label for="checkbox3"> {{ucfirst($plat)}} </label>
                                                        </div>
                                                        @endif
                                                    @else
                                                        <div class="checkbox checkbox-info">
                                                            <input id="checkbox3" type="checkbox" name="content_platform[]" value="{{$plat}}">
                                                            <label for="checkbox3"> {{ucfirst($plat)}} </label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>

                                            <!-- Genre -->
                                            <div class="form-group">
                                                <label>Genres</label>
                                                    @foreach(\App\Catalogs::where('type','genre')->get() as $genre_item)
                                                    @php ($genres[] = $genre_item)
                                                    @endforeach
                                                    @foreach ($genres as $genre)
                                                        @if (is_array($data['genre']))
                                                            @if (in_array($genre->slug,$data['genre']))
                                                            <div class="checkbox checkbox-info">
                                                                <input id="check-genre-{{$genre->ID}}" type="checkbox" checked="" name="content_genre[]" value="{{$genre->slug}}">
                                                                <label for="check-genre{{$genre->ID}}"> {{$genre->name}} </label>
                                                            </div>
                                                            @else
                                                            <div class="checkbox checkbox-info">
                                                                <input id="check-genre-{{$genre->ID}}" type="checkbox" name="content_genre[]" value="{{$genre->slug}}">
                                                                <label for="check-genre{{$genre->ID}}"> {{$genre->name}} </label>
                                                            </div>
                                                            @endif
                                                        @else
                                                        <div class="checkbox checkbox-info">
                                                            <input id="check-genre-{{$genre->ID}}" type="checkbox" name="content_genre[]" value="{{$genre->slug}}">
                                                            <label for="check-genre{{$genre->ID}}"> {{$genre->name}} </label>
                                                        </div>
                                                        @endif
                                                    @endforeach
                                            </div>

                                            <!-- Content type -->
                                            <div class="form-group">
                                                <label>Content Type</label>
                                                <select class="form-control" name="content_type">
                                                    <option>{{$data['data']['content_type']}}</option>>
                                                    @if ($data['data']['content_type'] != 'Show')
                                                    <option>Show</option>
                                                    @endif
                                                    @if($data['data']['content_type'] != 'Season')
                                                    <option>Season</option>
                                                    @endif
                                                    @if($data['data']['content_type'] != 'Episode')
                                                    <option>Episode</option>
                                                    @endif
                                                    @if($data['data']['content_type'] != 'Promo')
                                                    <option>Promo</option>
                                                    @endif
                                                    @if($data['data']['content_type'] != 'Standalone')
                                                    <option>Standalone</option>
                                                    @endif
                                                </select>  
                                            </div>

                                            <!-- language -->
                                            <div class="form-group">
                                                <label>Content Language</label>
                                                <input type="text" class="form-control" name="content_language" value="{{$data['data']['language']}}">
                                            </div>

                                            <!-- Other Languages -->
                                            <div class="form-group">
                                                <label>Other Languages</label>
                                                @if(!empty($data['data']['other_language']))
                                                <input type="text" class="form-control" name="other_languages" value="{{$data['data']['other_language']}}">

                                                @else
                                                <input type="text" class="form-control" name="other_languages" >
                                                @endif
                                                
                                            </div>

                                            <!-- Order -->
                                            <div class="form-group">
                                                <label>Order</label>
                                                <input type="text" class="form-control" name="content_order" value="{{$data['data']['content_order']}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Parent</label>
                                                <input type="text" class="form-control" name="parent" value="{{$data['data']['parent']}}">
                                            </div>
                                            <!-- featured image -->
                                            <div class="form-group">
                                                    <label for="input-file-now">Featured Image</label>
                                                    <input type="file" class="dropify" name="post_thumbnail">
                                            </div>

                                             <!-- Regions -->
                                             <div class="form-group">
                                                <label>Regions</label>
                                                <select class="form-control" name="region">
                                                    @if(!empty($data['data']['region']))
                                                    <option>{{$data['data']['region']}}</option>
                                                        @if ($data['data']['region'] != 'India')
                                                        <option>India</option>
                                                        @endif
                                                        @if($data['data']['region'] != 'Overseas')
                                                        <option>Overseas</option>
                                                        @endif
                                                        @if($data['data']['region'] != 'Allover')
                                                        <option>Allover</option>
                                                        @endif
                                                    @else 
                                                    <option>India</option>
                                                    <option>Overseas</option>
                                                    <option>Allover</option>
                                                    @endif 
                                                </select>
                                            </div>
                                            

                                             <!-- Status -->
                                            <div class="form-group" style="padding: 2%;border: dashed 1px lightgrey;">
                                                <label class="control-label">Status</label>
                                                <div class="radio-list">
                                                 @if($data['data']['status'] == 1)  
                                                    <label class="radio-inline p-0">
                                                        <div class="radio radio-info">
                                                            <input type="radio" id="status1" name="content_status" checked value="1">
                                                            <label for="status1">Active</label>
                                                        </div>
                                                    </label>
                                                   
                                                    <label class="radio-inline">
                                                        <div class="radio radio-info">
                                                            <input type="radio" id="status2" name="content_status" value="0">
                                                            <label for="status2">Inactive</label>
                                                        </div>
                                                    </label>
                                                @else($data['data']['status'] == 0)  
                                                    <label class="radio-inline p-0">
                                                        <div class="radio radio-info">
                                                            <input type="radio" id="status1" name="content_status" value="1">
                                                            <label for="status1">Active</label>
                                                        </div>
                                                    </label>
                                                   
                                                    <label class="radio-inline">
                                                        <div class="radio radio-info">
                                                            <input type="radio" id="status2" name="content_status" checked value="0">
                                                            <label for="status2">Inactive</label>
                                                        </div>
                                                    </label>
                                                 @endif

                                                </div>
                                            </div>

                                        </div>
                                        <!-- /RHS -->
                                        <div class="col-md-8">
                                            <input type="submit" name="update_content" value="Upload Content" class="btn btn-info">
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