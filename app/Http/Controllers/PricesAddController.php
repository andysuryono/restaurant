<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Price;

use Validator;

class PricesAddController extends Controller
{
    //
    public function execute(Request $request) {

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

                // 'required|between:0,99.99' ?
    		$validator = Validator::make($input,[
    				'name' => 'required|max:100',
    				'text' => 'required|max:100',
    				'price' => 'required'
    			]);
    		if ($validator->fails()) {
    			return redirect()->route('pricesAdd')->withErrors($validator)->withInput();
    		}

    		$price = new Price();

    		$price->fill($input);

    		if ($price->save()) {
    			return redirect('admin')->with('status', 'Done with new Tariff');
    		}
    	}

    	if (view()->exists('admin.price_add')) {
    		
    		$data = [
    			'title' => ' New tariff'
    		];

    		return view('admin.price_add',$data);
    	}
        abort(404);
    }

    public function mexecute(Request $request) {

        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');

                // 'required|between:0,99.99' ?
            $validator = Validator::make($input,[
                    'name' => 'required|max:100',
                    'text' => 'required|max:100',
                    'price' => 'required'
                ]);
            if ($validator->fails()) {
                return redirect()->route('mpricesAdd')->withErrors($validator)->withInput();
            }

            $price = new Price();

            $price->fill($input);

            if ($price->save()) {
                return redirect('manager')->with('status', 'Done with new Tariff');
            }
        }

        if (view()->exists('manager.price_add')) {
            
            $data = [
                'title' => ' New tariff'
            ];

            return view('manager.price_add',$data);
        }
        abort(404);
    }
}
