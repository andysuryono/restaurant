<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

class ClientsController extends Controller
{
    //
    public function execute() {

    	if (view()->exists('admin.clients')) {

    		$clients = Client::orderBy('created_at','desc')->get();
    		
    		$data = [
    			'title' => 'Feedback',
    			'clients' => $clients
    		];
    		
    		return view('admin.clients',$data);
    	}
    	abort(404);

    }

    public function mexecute() {

        if (view()->exists('manager.clients')) {

            $clients = Client::orderBy('created_at','desc')->get();
            
            $data = [
                'title' => 'Feedback',
                'clients' => $clients
            ];
            
            return view('manager.clients',$data);
        }
        abort(404);

    }
}
