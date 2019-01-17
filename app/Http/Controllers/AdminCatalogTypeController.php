<?php 

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use App\Catalogs;
use Validator;
use App\ContentCatalog;
use App\Contents;
use App\ContentMeta;

class AdminCatalogTypeController extends Controller{
	
	public function catalogType($catalog_name){
        $catalog_data = \App\Catalogs::where('type', $catalog_name)->get();
        //echo($catalog_data); exit();
        $catalog_data_count = count(json_decode($catalog_data,true));
         // echo($catalog_data_count); exit();
        if($catalog_name == 'catalog' || $catalog_name == 'genre'){
        	if($catalog_data_count == 0){
        		//$catalog_data = new Catalog();
        		$catalog_data->type = $catalog_name;
        		
        	}
        	return view('admin.catalog-list')->with('catalog_data',$catalog_data);
    	}
       
    }

    public function addCatalogType(Request $request){

    	$validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('catalog-type/'.$request->type)
                        ->withErrors($validator)
                        ->withInput();
        }


    	if(isset($request->slug)){
    		$request['slug'] = slugify($request->slug);
    	}else{
    		$request['slug'] = slugify($request->name);
    	}
    	if(isset($request->ID)){
            DB::table('catalog')
            ->where('ID', $request->ID)
            ->update(['name' => $request->name, 'slug' => $request->slug,'menu_icon' => $request->menu_icon,'show_in_menu' => $request->show_in_menu]);
            $user = new Catalogs();
            $user->type = $request->type;
        }else{
            if(empty($request->menu_icon))
                unset($request->menu_icon);
           $user = Catalogs::create($request->all());
        }
    	return redirect('catalog-type/'.$user->type);
    }

    public function removeRow($request){

        $urlData = explode("-",$request);
            $user = Catalogs::find($urlData[1]);
            $user->delete();
            return redirect('catalog-type/'.$urlData[0]);
    }
    public function deleteAjaxCatalog(Request $req){
        if(isset($_POST['delete_cat_id'])){
            $content_ids = \App\ContentCatalog::where('catalog_id',$_POST['delete_cat_id'])->select('content_id')->get()->toArray(); 
            \App\Catalogs::find($_POST['delete_cat_id'])->delete();
            if (!empty($content_ids)) {
                \App\Contents::whereIn('ID',$content_ids)->delete();
                \App\ContentCatalog::whereIn('content_id',$content_ids)->delete();
                \App\ContentMeta::whereIn('content_id',$content_ids)->delete();
            }
        }
    }

}