<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider;

class SlidersController extends Controller
{
    //
    public function execute() {

    	if (view()->exists('admin.sliders')) {

    		$sliders = Slider::orderBy('created_at','desc')->get();
    		
    		$data = [
    			'title' => 'Slides',
    			'sliders' => $sliders
    		];

    		return view('admin.sliders',$data);

    	}
    	abort(404);
    }

    public function mexecute() {

        if (view()->exists('manager.sliders')) {

            $sliders = Slider::orderBy('created_at','desc')->get();
            
            $data = [
                'title' => 'Slides',
                'sliders' => $sliders
            ];

            return view('manager.sliders',$data);

        }
        abort(404);
    }
}
