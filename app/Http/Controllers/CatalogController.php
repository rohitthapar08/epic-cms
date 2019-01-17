<?php 
namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
/**
 * SK controller for catalog related functionality.
 *
 * @package laravel
 * @subpackage Controller
 */
class CatalogController extends Controller
{
	/**
	 * Returns the html for the catalog detail page.
	 *
	 * @return \Illuminate\Http\Response Response object with output and headers
	 */
	public function detailAction()
	{
		//$params = app( 'Aimeos\Shop\Base\Page' )->getSections( 'catalog-detail' );
		//return Response::view('shop::catalog.detail', $params);
	}


	/**
	 * Returns the html for the catalog list page.
	 *
	 * @return \Illuminate\Http\Response Response object with output and headers
	 */
	public function indexPage($categoryslug = null)
	{
		//$params = app( 'Aimeos\Shop\Base\Page' )->getSections( 'catalog-list' );
		//return Response::view('shop::catalog.list', $params);
		$catnavigation = MainController::getCatNav();
		if ($categoryslug != null && !empty($categoryslug)) {
        	$solrquery = 'content_type:product AND category:'.ucfirst($categoryslug);
	    	$products = curlSelectRequest($solrquery);
	    	$products = $products->docs;
	    	return view('category', compact('products','catnavigation'));
    	}
	}
}