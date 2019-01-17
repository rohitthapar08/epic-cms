<?php 

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Contents;
use App\ContentMeta;
use App\ContentCatalog;
use Validator;
use App\Collections;
use App\CollectionData;
use App\Catalogs;

class AdminContentController extends Controller{

    public function trashActions(Request $update){
        if (isset($_POST['restore_id'])) {
            $restore_content = \App\Contents::find($_POST['restore_id']);
            $restore_content->content_status = 'publish';
            $restore_content->save();
        }
        if (isset($_POST['delete_id'])) {
            $delete_content = \App\Contents::find($_POST['delete_id']);
            $delete_content->delete();
            return $delete_content->content_title;
        }
    }

    public function getTrashContents(){
        $trash_data =  \App\Contents::where('content_status', 'trash')->get();
        return view('admin.admin-trash')->with('trash_data',$trash_data);
    }

    public function listALlContents(Request $req){
        //main content data fetch
        $content_ids = \App\ContentCatalog::where('catalog_id',$_GET['catalog_id'])->pluck('content_id')->toArray();
        $content_data =  \App\Contents::where('parent', $_GET['parent_id'])->whereIn('ID',$content_ids)->get();
        
        //fetch data for catalog type and add buttons
        $data = array();
        $catalog_details = \App\Catalogs::where('ID',$_GET['catalog_id'])->pluck('name')->toArray();
        $data['catalog'] = $catalog_details[0];
        if ($_GET['parent_id'] == 0) {
            $avail = ['Show','Episode'];
        } else {
            $avails = \App\Contents::where('ID', $_GET['parent_id'])->pluck('content_type')->toArray();
            if ($avails[0] == 'Show') {
                $avail = ['Season','Episode'];
            } elseif($avails[0] == 'Season') {
                $avail = ['Episode'];
            }
        }
        $data['avails'] = $avail;

        //Breadcrumbs
        $navs = array();
        $navs[] = array(0,$catalog_details[0]);
        if ($_GET['parent_id'] != 0) {
            $nav_data = \App\Contents::where('ID', $_GET['parent_id'])->select('title','parent')->get()->toArray();
            if ($nav_data[0]['parent'] != 0) {
                $nav_check = \App\Contents::where('ID', $nav_data[0]['parent'])->select('title','parent')->get()->toArray();
                $navs[] = array($nav_check[0]['parent'],$nav_check[0]['title']);
            }
            $navs[] = array($nav_data[0]['parent'],$nav_data[0]['title']);
        }
        $data['navs'] = $navs;
        if (!$content_data->isEmpty()) {
          return view('admin.content-main')->with(compact('content_data', 'data'));
        } else {
           return view('admin.content-main')->with(compact('data'));
       }
    }

    public function content_update_view(){ 
        $data = array();
        $content = \App\Contents::where('ID',$_GET['content_id'])->get();
        foreach ($content as $value) {
            $data['ID'] = $value->ID;
            $data['title'] = $value->title;
            $data['slug'] = $value->slug;
            $data['description'] = $value->description;
            $data['short_description'] = $value->short_description;
            $data['content_type'] = $value->content_type;
            $data['parent'] = $value->parent;
            $data['language'] = $value->language;
            $data['content_order'] = $value->content_order;
            $date = str_replace(" ","T",$value->publish_start_date);
            $data['publish_start_date'] = $date;
            $date_new = str_replace(" ","T",$value->publish_end_date);
            $data['publish_end_date'] = $date_new;
            $data['status'] = $value->status;
            $data['video_url'] = $value->video_url;
            $data['free_premium'] = $value->free_premium;
            $data['login_required'] = $value->login_required;
            $data['created_on'] = $value->created_on;
            $data['created_by'] = $value->created_by;
            $data['modified_on'] = $value->modified_on;
            $data['modified_by'] = $value->modified_by;
        } 
        $meta = \App\ContentMeta::where('content_id',$_GET['content_id'])->get();
        
        $platforms = '';
        foreach ($meta as $value) {
            if ($value->meta_key == 'platform') {
                $platforms = json_decode($value->meta_value,true);
            } else{
                $data[$value->meta_key] = $value->meta_value;
            }
        }

        $catalog = \App\ContentCatalog::where('content_id',$_GET['content_id'])->get();
        // $content_data = '';
        foreach ($catalog as $value) {
            $data['catalog_id'] = $value->catalog_id;
            $genre = json_decode($value->content_genre,true);
        }
        $content_data = array('data'=>$data,'platform'=>$platforms,'genre'=>$genre);

        return view('admin.content-update')->with('data',$content_data);
    }

    public function updateContent(Request $update){
        if (isset($update->update_content)) {
            $post = \App\Contents::find($update->content_id);
            $post->title = $update->content_title;
            $post->slug = slugify($update->content_title);
            $post->description = $update->content_description;
            $post->short_description = $update->short_description;
            $post->content_type = $update->content_type;
            $post->parent = $update->parent;
            $post->language = $update->content_language;
            $post->content_order = $update->content_order;
            $post->publish_start_date = $update->publish_start_date;
            $post->publish_end_date = $update->publish_end_date;
            $post->status = $update->content_status;
            $post->video_url = $update->content_video_url;
            $post->free_premium = $update->content_availbility;
            $post->login_required = $update->content_access;
            $post->modified_on = date('Y-m-d H:i:s');
            $post->modified_by = \Auth::user()->ID;
            $post->save();
            
            //meta fields
            $meta_fields = array(
                'platform'=>json_encode($update->content_platform),
                'release_date'=>$update->release_date,
                'rating'=>$update->rating,
                'tags'=>$update->tags,
                'other_language'=>$update->other_languages,
                'region'=>$update->region
                );

            if ($update->hasFile('cast_and_crew_file')) {
                    $csvFile = $update->file('cast_and_crew_file');
                    $csvName = rand().'.csv';
                    $csvFile->move(public_path('cast_n_crew'),$csvName); 
                    $castCrewData = readCsvFile(config('globals.site_url_cms').'cast_n_crew/'.$csvName);
                    $meta_fields['cast_and_crew'] = json_encode($castCrewData);
            } 

            if ($update->hasFile('post_thumbnail')) {
                    $image = $update->file('post_thumbnail');
                    $name = rand().'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('featured-images'),$name);
                    $meta_fields['image'] = config('globals.site_url_cms').'featured-images/'.$name;
            }

            foreach ($meta_fields as $key => $value) {
                if (!empty($value)) {
                    $meta = DB::table('content_meta')
                    ->where('content_id',$update->content_id)
                    ->where('meta_key',$key)
                    ->update(['meta_value' => $value]);
                }
            }
            
            $catalog_db = DB::table('content_catalog')->where('content_id',$update->content_id)->update(['content_genre'=>json_encode($update->content_genre)]);
            solrData($update->content_id, 'content');
            return redirect()->route('update.content', array('content_id' => $update->content_id));
        }

    }

    public function add_new_view(){
        if (isset($_GET['catalog_id']) && isset($_GET['parent_id'])) {
            $some = array();
            $catalog = \App\Catalogs::where('ID',$_GET['catalog_id'])->pluck('name')->toArray();
            $some[] = $catalog[0];
            if ($_GET['parent_id'] != 0) {
                $parents = \App\Contents::where('ID',$_GET['parent_id'])->get();
                $some[] = $parents[0]->title;
                if ($parents[0]->parent != 0) {
                   $grand = \App\Contents::where('ID',$parents[0]->parent)->get();
                   $some[] = $grand[0]->title;
                }
                
            }
        }
        return view('admin.content-single-params')->with('nav',$some); 
    }

    public function new_content_with_params(Request $data){

        if (isset($data->publish_content)) {
            $content = new Contents();
            $content->title = $data->content_title;
            $content->slug = slugify($data->content_title);
            $content->description = $data->content_description;
            $content->short_description = $data->content_excerpt;
            $content->content_type = $data->content_type;
            $content->parent = $data->parent_ID;
            $content->language = $data->content_language;
            $content->content_order = $data->content_order;
            $content->publish_start_date = $data->publish_start_date;
            $content->publish_end_date = $data->publish_end_date;
            $content->status = $data->content_status;
            $content->video_url = $data->content_video_url;
            $content->free_premium = $data->content_availbility;
            $content->login_required = $data->content_access;
            $content->created_on = date('Y-m-d H:i:s');
            $content->created_by = \Auth::user()->ID;
            $content->modified_on = date('Y-m-d H:i:s');
            $content->modified_by = \Auth::user()->ID;
            $success = $content->save();

            $metaFields = array(
                'platform'=>json_encode($data->content_platform),
                'release_date'=>$data->release_date,
                'rating'=>$data->content_rating,
                'tags'=>$data->content_tags,
                'region'=>$data->content_region,
                'other_language'=>$data->other_languages,
                'image'=> '',
                'cast_and_crew'=> ''
            );

             if ($data->hasFile('cast_and_crew_file')) {
                    $csvFile = $data->file('cast_and_crew_file');
                    $csvName = rand().'.csv';
                    $csvFile->move(public_path('cast_n_crew'),$csvName); 
                    $castCrewData = readCsvFile(config('globals.site_url_cms').'cast_n_crew/'.$csvName);
                    $castCrewJson = json_encode($castCrewData);
                    $metaFields['cast_and_crew'] = $castCrewJson;
                }   

            $thumbnail = Validator::make($data->all(), [
                    'post_thumbnail' => 'image|mimes:jpeg,png,jpg,gif|max:5000',
                ]);
                if ($thumbnail->fails()) {
                    //do nothing
                } else {
                    if ($data->hasFile('post_thumbnail')) {
                    $image = $data->file('post_thumbnail');
                    $name = rand().'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('featured-images'),$name);
                    $metaFields['image'] = config('globals.site_url_cms').'featured-images/'.$name;
                }
            }
            foreach ($metaFields as $metakey => $metaValue) {
                $meta = new ContentMeta();
                $meta->meta_key = $metakey;
                $meta->meta_value = $metaValue;
                $meta->save();
                $meta->content_id = $content->content_meta()->save($meta);
            }

            $catalog = new ContentCatalog();
            $catalog->catalog_id = $data->catalog_id;
            $catalog->content_genre = json_encode($data->content_genre);
            $catalog->save();
            $catalog->content_id = $content->content_catalog()->save($catalog);
        }
        if (!empty($success) && $success == true) {
            solrData($content->ID, 'content');
            return redirect()->route('catalog.lists', ['catalog_id' => $data->catalog_id,'parent_id'=>$data->parent_ID]);
        }
    }

    //delete content
    public function deleteContent(){
        if (isset($_POST['delContent'])) {
            \App\Contents::find($_POST['delContent'])->delete();
            \App\ContentMeta::where('content_id',$_POST['delContent'])->delete();
            \App\ContentCatalog::where('content_id',$_POST['delContent'])->delete();
            delete_solr_data('content-'.$_POST['delContent']);
        }
    }    

}