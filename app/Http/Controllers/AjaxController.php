<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
class AjaxController extends Controller
{
    function searchshubhkart(Request $request){
    	$searchTerm = $request->get('search');
    	$solrquery = '-name:Uncategorized AND (name:"'.$searchTerm.'" OR short_desc:"'.$searchTerm.'" OR tag:"'.$searchTerm.'")';
    	$idolsproducts = curlSelectRequest($solrquery);
		$idolsproducts = $idolsproducts->docs;
		$html = '';
		if(!empty($idolsproducts)){
			foreach($idolsproducts as $p){
				$html .= '<a onclick="getSearchResultPage(\''.$p->slug.'\');"><span>'.$p->name.'</span></a><br>';
			}	
		}
		return $html;
    }
}
