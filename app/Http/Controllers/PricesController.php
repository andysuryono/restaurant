<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Price;

class PricesController extends Controller
{
    //
    public function execute() {

    	if (view()->exists('admin.prices')) {
    		
    		$prices = Price::orderBy('position')->get();

    		$data = [
    			'title' => 'Prices',
    			'prices' => $prices
    		];

    		return view('admin.prices',$data);
    	}
    	abort(404);
    }

    public function mexecute() {

        if (view()->exists('manager.prices')) {
            
            $prices = Price::orderBy('position')->get();

            $data = [
                'title' => 'Prices',
                'prices' => $prices
            ];

            return view('manager.prices',$data);
        }
        abort(404);
    }
}
