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