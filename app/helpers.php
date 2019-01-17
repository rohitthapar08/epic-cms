<?php

/* 
 * Print the information/data/json/array/anything in readble format
 */
if(!function_exists('pr')){
	function pr($toPrint){
		echo "<pre>";
		print_r($toPrint);
		echo "</pre>";
	}
}

/* 
 * Curl POST request to CURD on operations product solr core using JSON data format
 */
if(!function_exists('curlPostRequest')){
	function curlPostRequest($jsonData,$mode=''){
		$url = SKSOLR_HOST.'solr/'.SKSOLR_CORE.'/update?commit=true';
		// create curl resource 
	    $ch = curl_init(); 
	    // set url 
	    //echo "<br>";echo $url;echo "<br>";
	    curl_setopt($ch, CURLOPT_URL, $url); 
	    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $jsonData );
	    //return the transfer as a string 
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	    // $output contains the output string 
	    $output = curl_exec($ch); 

	    if($_GET['debug']=='~' || $_POST['debug']=='~' || $mode=='debug'){
	    	echo "<br> CURL URL: ".$url;
	    	echo "<br> Last Error detected by PHP just after CURL execution: ";
	    	pr(error_get_last());	
	    }
	    
		if($output === false)
	    {
	        $errorD = "Error Number:".curl_errno($ch)."<br>";
	        $errorD .= "Error String:".curl_error($ch);
	        $curllog = str_replace("<br>","=>",$errorD)."\n";
	        echo $errorD;
	    }
		//file_put_contents(ABSPATH."logs/CurlRequest-".date("Y-m-d").".log", $output, FILE_APPEND);    
	    //echo $output > ABSPATH."logs/CurlRequest-".date("Y-m-d").".log";
	    // close curl resource to free up system resources 
	    curl_close($ch);
	    return $output;
	}
}
/* 
 * Curl GET request to fetch product from solr core using JSON data format
 */
if(!function_exists('curlSelectRequest')){
	function curlSelectRequest($queryUrl,$dataMode='json',$rows=20,$others=''){

		if(empty($queryUrl)) return false;

		$url = 'http://'.Config::get('database.solr.localhost.host');
		$url .= ':'.Config::get('database.solr.localhost.port').'/solr/';
		$url .= Config::get('database.solr.localhost.core').'/select?q=';
		$url .= urlencode($queryUrl);
		$url .= '&rows='.$rows;
		$url .= '&wt='.$dataMode.'&indent=true';
		if(!empty($others)){
			$url .= $others;
		}
		//echo "<br>";
		//echo  $url;//die;
		// create curl resource 
		
	    $ch = curl_init(); 
	    // set url 
	    //if(Request::get('debug')=='~') echo "<br>";echo $url;echo "<br>";
	    curl_setopt($ch, CURLOPT_URL, $url); 
	//    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	//    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
	    curl_setopt($ch, CURLOPT_HEADER, false);
	//	curl_setopt( $ch, CURLOPT_POSTFIELDS, $jsonData );
	    //return the transfer as a string 
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	    // $output contains the output string 
	    $output = curl_exec($ch); 

	    /*if($_GET['debug']=='~' || $_POST['debug']=='~' || $mode=='debug'){
	    	echo "<br> CURL URL: ".$url;
	    	echo "<br> Last Error detected by PHP just after CURL execution: ";
	    	pr(error_get_last());	
	    }*/
	    
		if($output === false)
	    {
	        $errorD = "Error Number:".curl_errno($ch)."<br>";
	        $errorD .= "Error String:".curl_error($ch);
	        $curllog = str_replace("<br>","=>",$errorD)."\n";
	        echo $errorD;
	        curl_close($ch);
	        return json_decode($output);
	    } else{
	    	$output = json_decode($output);
	    	$output->response->QueryUrl = $url;
	    	$response = $output->response;
	    	// close curl resource to free up system resources 
	    	curl_close($ch);
	    	return $response;
	    }
		//file_put_contents(ABSPATH."logs/CurlRequest-".date("Y-m-d").".log", $output, FILE_APPEND);    
	    //echo $output > ABSPATH."logs/CurlRequest-".date("Y-m-d").".log";	    
	}
}

if(!function_exists('echo_menu')){
	function echo_menu($menu_array,$level=0,$style='') {
		    //go through each top level menu item
		    $html = $liststyleclass = $anchorstyleclass = '';
		    foreach($menu_array as $menu) {
		    	if(empty($style)) {
		    		//if(isset($menu->children) && !empty($menu->children)){
		    		//	$liststyleclass = 'nav-item dropdown';	
		    		//}
		    		if($level==0 && !empty($menu->children)){
		    			$liststyleclass = 'nav-item dropdown';
		    		} else {
		    			$liststyleclass = ''; 
		    		}
		    	} 
		    	else {
		    		if($level==0){
		    			$anchorstyleclass = "main-categories";
		    		} else if($level==1){
		    			$anchorstyleclass = "sub-categories";
		    		} else {											
		    			$anchorstyleclass = "sub-categories";
		    		}
		    	}
		        $html .= '<li class="'.$liststyleclass.'">';
		        $html .= '<a href="'.$menu->slug.'" class="'.$anchorstyleclass.'">'.$menu->name.'</a>';
		        //see if this menu has children
		        if(isset($menu->children) && !empty($menu->children) && $menu->level < 2){
		        	if($menu->level < 1) {
			            $html .= '<div class="dropdown-menu '.$menu->level.'">';
			            $html .= '<ul class="main-ul">';
			            $html .= '<li>';
			            $html .= '<ul>';
			        }
			            //echo the child menu
			            //if($menu->level< 2){
			            	$html .= echo_menu($menu->children,$menu->level,"sub-categories");	
			            //}
					if($menu->level < 1) {		            	
			            $html .=  '</ul>';
			            $html .= '</li>';
			            $html .= '</ul>';
			            $html .= '</div>';
			        }
		        }
		        $html .=  '</li>';
		    }
		    return $html;
	}
}

if(!function_exists('echo_footercategorymenu')){
	function echo_footercategorymenu($menu_array,$level=0) {
	    //go through each top level menu item
		//pr($menu_array);die;
	    $html = $liststyleclass = $anchorstyleclass = '';
	    foreach($menu_array as $menu) {
	    	if($menu->level > 0){
				$html .= '<li>';
	            $html .= '<a href="'.$menu->slug.'">'.$menu->name.'</a>';
	            $html .= '</li>';                    
            }
            if(isset($menu->children) && !empty($menu->children) && $menu->level==0){
            	$html .= '
<div class="col-lg-12 col-md-12 col-sm-12 sub-categories">
<ul><a href="'.$menu->slug.'" class="label">'.$menu->name.' : </a>';	        	
            	$html .= echo_footercategorymenu($menu->children,$menu->level);
		        $html .= '</ul>
</div>';    
    		} else if($menu->level==0) {
    			$html .= '
<div class="col-lg-12 col-md-12 col-sm-12 sub-categories">
<ul><a href="'.$menu->slug.'" class="label">'.$menu->name.' : </a>';	
		        $html .= '</ul>
</div>';    
    		}
	    }
	    return $html;
	}
}

if(!function_exists('post_data_to_solr')){
	function post_data_to_solr($inputStr, $type = "xml"){
		//var_dump($inputStr);
       $SOLR_URL = 'http://'.Config::get('database.solr.localhost.host').':'.Config::get('database.solr.localhost.port').'/solr/'.Config::get('database.solr.localhost.core').'/update?commit=true';
       if ($type == "json")
          $header = array("Content-type:application/json");
       else
          $header = array("Content-type:text/xml; charset=utf-8");
       $ch = curl_init() or die("error");
       curl_setopt($ch, CURLOPT_URL, $SOLR_URL);
       curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($ch, CURLOPT_POST, 1);
       curl_setopt($ch, CURLOPT_POSTFIELDS, $inputStr);
       curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
       curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
       $data = curl_exec($ch);
       //print_r($data);
       $curl_errno = curl_errno($ch);
       $curl_error = curl_error($ch);
       if ($curl_errno > 0) {
           print_r($curl_error);
           curl_close($ch);
           die;
           return false;
       }
       curl_close($ch);
       return true;
   }
}
if (!function_exists('lmpl_clean_solr_feed')) {
	function lmpl_clean_solr_feed($QueryUrl){ 
    if(!empty($QueryUrl)){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$QueryUrl);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Accept: application/json'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_NOSIGNAL, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $data = curl_exec($ch);
        $curl_error = curl_error($ch);
        $curl_errno = curl_errno($ch);
        if ($curl_errno > 0) {
            return "cURL Error ($curl_errno): $curl_error\n";die;
        }
        return $data;
    }
}
}

if(!function_exists('solrData')){
	function solrData($content_id, $type) {
		$data = array();
       $content = \App\Contents::where('ID',$content_id)->get();
       $timezone = "Asia/Kolkata";
       if (strtolower($type) == 'content') {
	       	foreach ($content as $value) {
	           $data['id'] = $type.'-'.$value->ID;
	           $data['title'] = array('set'=>$value->title);
	           $data['slug'] = array('set'=>slugify($value->slug));
	           $data['description'] = array('set'=>$value->description);
	           $data['short_description'] = array('set'=>$value->short_description);
	           $data['content_type'] = array('set'=>$value->content_type);
	           if (is_null($value->parent)) {
	           	$data['parent_content_id'] = array('set'=>(int)0);
	           } else {
	           	$data['parent_content_id'] = array('set'=>(int)$value->parent);
	           }
	           
	           $data['languages'] = array('set'=>$value->language);
	           $data['order'] = array('set'=>$value->content_order);
	           
			   $data['publish_start_date'] = array('set'=> strtotime($value->publish_start_date.' '. $timezone));
	           $data['publish_end_date'] = array('set'=> strtotime($value->publish_end_date.' '. $timezone));
	           $data['status'] = array('set'=>$value->status);
	           $data['video_url'] = array('set'=>$value->video_url);
	           $data['free_premium'] = array('set'=>$value->free_premium);
	           $data['login_required'] = array('set'=>$value->login_required);
	           $data['created_on'] = array('set'=> strtotime($value->created_on.' '. $timezone));
	           $data['created_by'] = array('set'=> $value->created_by);
	           if ($value->modified_on != '0000-00-00 00:00:00' && $value->modified_on != $value->created_on) {
	           		$data['modified_on'] = array('set'=> strtotime($value->modified_on.' '. $timezone)); 
	           } else {
	           		$data['modified_on'] = array('set'=> strtotime($value->created_on.' '. $timezone));
	           }
	           $data['modified_by'] = array('set'=> $value->modified_by);
	        }

	       $meta = \App\ContentMeta::where('content_id',$content_id)->get();
			foreach ($meta as $value) {
				if($value->meta_key == 'release_date') {
					$data[$value->meta_key] = array('set'=> strtotime($value->meta_value.' '. $timezone));
				}
				else{
					$data[$value->meta_key] = array('set' =>$value->meta_value);
				}
	       }

	       $catalog = \App\ContentCatalog::where('content_id',$content_id)->get();
			foreach ($catalog as $value) {
	           //$data['catalog_id'] = array('set' => $value->catalog_id);
	           $data['content_genre'] = array('set' => $value->content_genre);

	       }

	       $catalog_name = \App\Catalogs::where('ID',$value->catalog_id)->get();
			foreach ($catalog_name as $val) {
	           $data['catalog_s'] = array('set' => $val->name);
	       }

       }
       //  elseif (strtolower($type) == 'collection') {
	      //  	$collections = \App\Collections::where('ID',$content_id)->get();
	      //  foreach ($collections as $value) {
	      //  	   $data['id'] = $type.'-'.$value->ID;
	      //      $data['title'] = array('set' => $value->name);
	      //      $data['content_type'] = array('set' => $value->collection_type);
	      //      $data['order'] = array('set' => $value->collection_order);
	      //      $data['parent_content_id'] = 0;
	      //  }

	      //  $collData = array();
	      //  $collections_data = \App\CollectionData::where('collection_id',$content_id)->get();
	      //  if(!$collections_data->isEmpty()){
		     //   	foreach ($collections_data as $value) {
		     //       $collData[] = array($value->content_type => $value->content_id);
		     //   }
		     //   $data['description'] = json_encode($collData);
	      //  }
       // }

       post_data_to_solr('['.json_encode($data).']','json');
	}

}
if (!function_exists('delete_solr_data')) {
	function delete_solr_data($delete_id){
		$deleteArticle = "http://35.173.51.156:8983/solr/epic_content/update?stream.body=%3Cdelete%3E%3Cquery%3Eid:".$delete_id."%3C/query%3E%3C/delete%3E&commit=true";
		lmpl_clean_solr_feed($deleteArticle);
	}
}
if(!function_exists('slugify')){
	function slugify($text)
	{
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
}
if(!function_exists('readCsvFile')){
	function readCsvFile($csvFile){
		
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle) ) {
            $CSV_Data_Array[] = fgetcsv($file_handle);
        }
        fclose($file_handle);
        return $CSV_Data_Array;
    }
}
