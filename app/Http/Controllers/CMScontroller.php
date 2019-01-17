<?php 

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Contents;
use App\Hotspots;
use Validator;

class CMScontroller extends Controller{


	public function getHotspots(){
		$hotspots = \App\Hotspots::all();
		return view('admin.cms-hotspots')->with(compact('hotspots'));
	}

	public function hotspotActions(Request $hotspot){

		//search ajax handle
		if (isset($_POST['search_term'])) {
			$response = '';
			$search_data = \App\Contents::where('title', 'LIKE', '%' . $_POST['search_term'] . '%')->get();
		
			foreach ($search_data as $content_data) {
				$response .= '<div class="media">
		                    		<div class="media-body">
                                        <input type="hidden" value="'.$content_data->ID.'" name="hidden_content_id[]">
		                    			<h5 class="media-heading text-left">'.$content_data->title.'
		                    				<br><small>'.$content_data->content_type.'</small>
		                    			</h5>
                                        <button class="btn btn-danger hotspot_add_content" style="float:right;">Add</button>
		                    		</div>
		                    	</div>';
			}

			return $response;
			
		}

		//Ajax append content html to update side
		if (isset($_POST['hotspot_id'])) {
			$response = '';
			$hotspot_data = \App\Hotspots::where('ID',$_POST['hotspot_id'])->get();
			$content_json = json_decode($hotspot_data[0]->content_id);
			if (empty($content_json)) {
				return $response;
			}
			$related_content = \App\Contents::whereIn('ID',$content_json)->get();
			
			foreach ($related_content as $value) {
				$response .= '<div class="media">';
				$response .= '<div class="media-body">';
				$response .= '<input type="hidden" value="'.$value->ID.'" name="hidden_content_id[]">';
				$response .= '<h5 class="media-heading text-left">'.$value->title;
				$response .= '<br><small>'.$value->content_type.'</small>';
				$response .= '</h5>';
				$response .= '<button class="btn btn-danger hotspot_delete_content" style="float:right;">Delete</button>';
				$response .= '</div>';
				$response .= '</div>';
			}
			return $response;
		}	

		//hotspot update ajax callback
		if (isset($_POST['hotSpot_call_ID'])) {
			$alert = '';
			if (empty($_POST['hotSpot_call_ID'])) {
				$alert = 'Please Select Hotspot Type';
				return $alert;
			}
			if (!empty($_POST['content_ids'])) {
				$content_json = json_encode($_POST['content_ids']);
			} else {
				$content_json = null;
			}
			$update_hotspot = \App\Hotspots::find($_POST['hotSpot_call_ID']);
			$update_hotspot->content_id = $content_json;
			$update_hotspot->save();
			
			//store into solr
			$content = \App\Contents::whereIn('ID',$_POST['content_ids'])->select('ID','title','slug','short_description')->get();
			$widget_data = array();
			if(!empty($content)){
				foreach($content as $k=>$v){
					$widget_data[$k] = array(
										'id'=>$v->ID,
										'title' => $v->title,
										'slug'=>$v->slug,
										'short_description' => $v->short_description,
										);
				}
			}
			
			$timezone = "Asia/Kolkata";
			$hotspot_data = \App\Hotspots::where('ID',$_POST['hotSpot_call_ID'])->get();
			$widget = array();
			$widget['id'] = 'widget_'.$_POST['hotSpot_call_ID'];
			$widget['title'] = $hotspot_data[0]->hotspot_name;
			$widget['slug'] =  str_replace(" ","-",strtolower($hotspot_data[0]->hotspot_name));
			$widget['description'] = json_encode($widget_data);
			$widget['content_type'] = 'widget';
			$widget['languages'] = 'English';
			$widget['publish_start_date'] = array('set'=> strtotime(date("Y-m-d h:i").' '. $timezone));
			$widget['languages'] = 'English';
			$widget['parent_content_id'] = array('set'=>(int)0);
			if(!empty($widget)){
				post_data_to_solr('['.json_encode($widget).']','json');
			}
			
			$alert = 'Hotspot Updated';
			return $alert;
		}

	}

	public function getBanners(){
        $banners = \App\Contents::where('content_type', 'banner')->where('status',1)->orderBy('modified_on','desc')->get();
        return view('admin.cms-banners')->with(compact('banners'));
    }

    //banner upload handler
    public function uploadBanner(Request $banner){
        
        if (isset($_POST['delBanner'])) {
            $delBanner =  \App\Contents::find($_POST['delBanner']);
            $delBanner->status = 0;
            $delBanner->save();
        }

        $validator = Validator::make($banner->all(), [
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect('cms/banners/')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            if ($banner->hasFile('banner_image')) {
            $image = $banner->file('banner_image');
            $name = rand().'.'.$image->getClientOriginalExtension();

            $image->move(public_path('banners'),$name);
            $banner_content = new Contents();
            $banner_content->title = $banner->banner_title;
            $banner_content->content_type = 'banner';
            $banner_content->video_url = config('globals.site_url_cms').'banners/'.$name;
            $banner_content->created_on = date('Y-m-d H:i:s');
            $banner_content->created_by = \Auth::user()->ID;
            $banner_content->modified_on = date('Y-m-d H:i:s');
            $banner_content->modified_by = \Auth::user()->ID;
            $banner_content->status = 1;
            $banner_content->save();
            return back();
            } else {
                echo $banner->banner_title;
            }
        }

    }

}