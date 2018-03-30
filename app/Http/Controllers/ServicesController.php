<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;

class ServicesController extends Controller
{
    //
    public function execute() {

    	if (view()->exists('admin.services')) {

    		$services = Service::all();
    		
    		$data = [
    			'title' => 'Services',
    			'services' => $services
    		];

    		return view('admin.services',$data);

    	}
    	abort(404);
    }

    public function mexecute() {

        if (view()->exists('manager.services')) {

            $services = Service::all();
            
            $data = [
                'title' => 'Services',
                'services' => $services
            ];

            return view('manager.services',$data);

        }
        abort(404);
    }

}