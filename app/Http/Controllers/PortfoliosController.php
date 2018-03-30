<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Portfolio;

class PortfoliosController extends Controller
{
    //
    public function execute() {

    	if (view()->exists('admin.portfolios')) {
    		
    		$portfolios = Portfolio::orderBy('created_at','desc')->get();

    		$data = [
    			'title' => 'Gallery',
    			'portfolios' => $portfolios,
    		];

    		return view('admin.portfolios',$data);
    	}
        abort(404);
    }

    public function mexecute() {

        if (view()->exists('manager.portfolios')) {
            
            $portfolios = Portfolio::orderBy('created_at','desc')->get();

            $data = [
                'title' => 'Gallery',
                'portfolios' => $portfolios,
            ];

            return view('manager.portfolios',$data);
        }
        abort(404);
    }
}
