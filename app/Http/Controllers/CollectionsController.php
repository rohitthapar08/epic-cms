<?php 

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Contents;
use App\Collections;
use App\CollectionData;
use Validator;

class CollectionsController extends Controller{

	public function slugify($text){
			  // replace non letter or digits by -
			  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

			  // transliterate
			  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

			  // remove unwanted characters
			  $text = preg_replace('~[^-\w]+~', '', $text);

			  // trim
			  $text = trim($text, '-');

			  // remove duplicate -
			  $text = preg_replace('~-+~', '-', $text);

			  // lowercase
			  $text = strtolower($text);
			  
			  if (empty($text)) {
			    return 'n-a';
			  }
			  return $text;
			}

    public function listing_collections(){
        $data =  \App\Collections::all();
        return view('admin.collections-listing')->with('data',$data);
    }

    public function add_collection(){
        return view('admin.collections-add-new');
    }

    public function upload_collection(Request $collection){

    	if (isset($_POST['searchTerm']) && isset($_POST['contentType'])) {
    		if ($_POST['contentType'] == 'Content') {
    			$data = \App\Contents::where('title', 'like', '%' . $_POST['searchTerm'] . '%')->get();
    		} elseif ($_POST['contentType'] == 'Collection') {
    			$data = \App\Collections::where('title', 'like', '%' . $_POST['searchTerm'] . '%')->get();
    		}
    		$res = array();
    		if (!empty($data)) {
    			foreach ($data as $title) {
    				$res[] = $title->title;
    			}
    		}
    		return $res;
    	}

    	if (isset($collection->add_collection)) {
            $new = new Collections();
            $new->name = $collection->collection_name;
            $new->collection_type = $collection->type;
            $new->collection_order = $collection->collection_order;
            $success = $new->save();

            if ($collection->type == 1) {
                if (!empty($collection->content_type)) {
                    $c = 0;
                    foreach($collection->content_type as $type){
                        $data = new CollectionData();
                        $data->content_type = $type;
                        $conID = \App\Contents::where('title', $collection->content_id[$c])->get();
                        $data->content_id = $conID[0]->ID;
                        $data->save();
                        $data->collection_id = $new->collection_data()->save($data);
                        $c++;
                    }
                }
            }
            if ($success == true) {
                solrData($new->ID, 'collection');
            }
            $data =  \App\Collections::all();
            return view('admin.collections-listing')->with('data',$data);
    	}
    }

    public function post_methods(Request $post){
        if (isset($_POST['delete_id'])) {
            \App\Collections::find($_POST['delete_id'])->delete();
            \App\CollectionData::where('collection_id',$_POST['delete_id'])->delete();
            delete_solr_data('collection-'.$_POST['delContent']);
        }
    }

    //update methods
    public function upload_view(){
        $colls = \App\Collections::where('ID',$_GET['collection_id'])->get();
        $meta = \App\CollectionData::where('collection_id',$_GET['collection_id'])->get();
        foreach ($colls as $coll) {
            $data[] = array($coll->ID,$coll->name,$coll->collection_type,$coll->collection_order);
        }
        $metas = array();
        foreach ($meta as $met) {
            $title = \App\Contents::where('ID',$met->content_id)->get();
            $metas[] = array($met->ID,$met->collection_id,$met->content_type,$title[0]->title);
        } 
        array_push($data, $metas);
        return view('admin.collections-update')->with('data',$data);
    }

    public function upload_methods(Request $update){
        if (isset($update->update_collection)) {
            //update collection table
            $up = \App\Collections::find($update->collection_id);
            $up->name = $update->collection_name;
            $up->collection_type = $update->type;
            $up->collection_order = $update->collection_order;
            $up->save();

            //Delete old contents from ContentData table if they are removed.
            $old_contents = \App\CollectionData::where('collection_id',$update->collection_id)->pluck('ID')->toArray();
            foreach ($old_contents as $old_content) {
                if (!in_array($old_content, $update->row_id)) {
                   $del = \App\CollectionData::find($old_content);
                   $del->delete();
                }
            }

            //update old contents
            $o = 0; //counter
            foreach ($update->row_id as $old_id) {
                $old_up = \App\CollectionData::find($old_content);
                $old_up->content_type = $update->old_content_type[$o];
                $old_con_id = \App\Contents::where('title', $update->old_content_id[$o])->get();
                $old_up->content_id = $old_con_id[0]->ID;
                $old_up->save();
            }

            //add newly added contents into ContentData table
            if (!empty($update->content_type)) {
                $k = 0; //counter
                foreach($update->content_type as $type){
                    $meta = new CollectionData();
                    $meta->content_type = $type;
                    $conID = \App\Contents::where('title', $update->content_id[$k])->get();
                    $meta->content_id = $conID[0]->ID;
                    $meta->save();
                    $meta->collection_id = $up->collection_data()->save($meta);
                    $k++;
                }
            }
            solrData($update->collection_id, 'collection');
            return redirect()->route('update.collection', ['collection_id' => $update->collection_id]);
        }
    }
}