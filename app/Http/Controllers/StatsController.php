<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stat;

class StatsController extends Controller
{
    //
    public function execute() {

    	if (view()->exists('admin.stats')) {

    		$stats = Stat::orderBy('created_at','desc')->get();
    		
    		$data = [
    			'title' => 'Statistics',
    			'stats' => $stats
    		];

    		return view('admin.stats',$data);
    	}
    	abort(404);
    }

    public function mexecute() {

        if (view()->exists('manager.stats')) {

            $stats = Stat::orderBy('created_at','desc')->get();
            
            $data = [
                'title' => 'Statistics',
                'stats' => $stats
            ];

            return view('manager.stats',$data);
        }
        abort(404);
    }
}
