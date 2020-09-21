<?php
/**
 * ProductController
 * @package api-product-recommendation
 * @version 0.0.1
 */

namespace ApiProductRecommendation\Controller;

use LibFormatter\Library\Formatter;
use ProductRecommendation\Library\Recommendation;

class ProductController extends \Api\Controller
{
	public function indexAction(){
		if(!$this->app->isAuthorized())
            return $this->resp(401);

        list($page, $rpp) = $this->req->getPager();

        $products = Recommendation::get($rpp, $page);
        if($products){
        	$products = Formatter::formatMany('product', $products, ['user']);
            foreach($products as &$product){
                $product->content = null;
                $product->meta    = null;
                $product->gallery = [];
            }
        }

        $this->resp(0, $products, null, [
        	'meta' => [
        		'page' => $page,
        		'rpp'  => $rpp
        	]
        ]);
    }
}