<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Price;

use Validator;

class PriceEditController extends Controller
{
    //
    public function execute(Price $price, Request $request) {

    	if ($request->isMethod('delete')) {
    		
    		$price->delete();
    		return redirect()->route('prices')->with('status','Tariff destroyed');
    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$validator = Validator::make($input,[
    				'name' => 'required|max:100',
    				'text' => 'required|max:100',
    				'price' => 'required'
    			]);
    		if ($validator->fails()) {
    			
    			return redirect()->route('priceEdit',['price' => $input['id']])
    							->withErrors($validator)->withInput();
    		}

    		$price->fill($input);

    		if ($price->update()) {
    			return redirect('admin')->with('status','Done with editing tariff');
    		}

    	}

    	$old = $price->toArray();

    	if (view()->exists('admin.price_edit')) {
    		
    		$data = [
    			'title' => 'Editing Tariff '.$old['name'],
    			'data' => $old
    		];

    		return view('admin.price_edit', $data);
    	}
    	abort(404);

    }

    public function mexecute(Price $price, Request $request) {

        if ($request->isMethod('delete')) {
            
            $price->delete();
            return redirect('manager')->with('status','Tariff destroyed');
        }

        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');

            $validator = Validator::make($input,[
                    'name' => 'required|max:100',
                    'text' => 'required|max:100',
                    'price' => 'required'
                ]);
            if ($validator->fails()) {
                
                return redirect()->route('mpriceEdit',['price' => $input['id']])
                                ->withErrors($validator)->withInput();
            }

            $price->fill($input);

            if ($price->update()) {
                return redirect('manager')->with('status','Done with editing tariff');
            }

        }

        $old = $price->toArray();

        if (view()->exists('manager.price_edit')) {
            
            $data = [
                'title' => 'Editing Tariff '.$old['name'],
                'data' => $old
            ];

            return view('manager.price_edit', $data);
        }
        abort(404);

    }
}
