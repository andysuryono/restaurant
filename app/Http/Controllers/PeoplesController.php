<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;

class PeoplesController extends Controller
{
    //
    public function execute() {

    	if (view()->exists('admin.peoples')) {

    		$peoples = People::orderBy('created_at','desc')->get();
    		
    		$data = [
    			'title' => 'Chefs',
    			'peoples' => $peoples
    		];

    		return view('admin.peoples',$data);

    	}
    	abort(404);
    }

    public function mexecute() {

        if (view()->exists('manager.peoples')) {

            $peoples = People::orderBy('created_at','desc')->get();
            
            $data = [
                'title' => 'Chefs',
                'peoples' => $peoples
            ];

            return view('manager.peoples',$data);

        }
        abort(404);
    }
}
