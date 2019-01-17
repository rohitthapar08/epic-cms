@include('admin.admin-header')
                <div class="row" style="margin-top:2%;text-align:center;">
                	<h2>Manage Hotspots</h2>
                    <div class="col-md-6">
                    		<div class="white-box">
                                <div class="form-group">
                                        <input placeholder="search..." class="form-control hotspot_search">
                                        <button class="btn btn-info search_content_btn" style="margin-top:2%;">Search</button>
                                </div>
                                <div class="search_content">
		                    	
                                </div>
                    		</div>
                    </div>
                    <div class="col-md-6">
                        <div class="white-box">
                                <div class="form-group">
                                        <select name="hotspot_up_select" class="form-control hotspot-list-ddpp" style="margin-top:2%;">
                                            <option></option>
                                            @foreach($hotspots as $hotspot)
                                            <option value="{{$hotspot->ID}}">{{$hotspot->hotspot_name}}</option>
                                            @endforeach
                                        </select> 
                                        </div>
                                        <div class="append-media">
                                        </div>
                                        <button class="btn btn-info hotspot_update_btn" style="margin-top:2%;">Save</button>
                            </div>
                        </div>
                    </div>
@include('admin.admin-footer')