<?php

namespace App\Http\Controllers;

use File;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MessageOutput;



class ProductsController extends Controller
{

    /**
     * Create a request of products
     *
     * @param  request $request
     * @return message
     */
    protected function sendRequest(request $request)
    {
		/**
		 * Double validation gotten from https://stackoverflow.com/questions/38947126/laravel-double-validation-regex-not-working
		 */
		$this->validate($request, [
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|max:255',
            'price' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/|min:3',
		]);				
		$datetime = date("Y-m-d h:m:s");
		$total_value = $request->price*$request->stock;
		$slug = str_slug($request->name);
		$jsonPackage = json_encode(array(
			"product_name"=>$request->name,
			"quantity_in_stock"=>(int)$request->stock,
			"price_per_item"=>$request->price,
			"datetime_submited"=>$datetime,
			"total_value"=>$total_value,
		));
		$saved = File::put('storage/app/'.$slug.'.json', $jsonPackage);
		$MessageOutput = new MessageOutputController("Product", "requested", $saved);
		echo $MessageOutput->toJSON();
	}		
}
