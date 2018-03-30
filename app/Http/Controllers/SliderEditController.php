<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider;
use Validator;
use Image;
use Config;

class SliderEditController extends Controller
{
    //
    public function execute(Slider $slider, Request $request) {

    	if ($request->isMethod('delete')) {
    		
    		$slider->delete();
    		return redirect('admin')->with('status','Slide deleted');
    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно к заполнению'
    		];

    		$validator = Validator::make($input,[
    				'title' => 'required|max:100',
    				'text' => 'required|max:100',
    				'img' => 'max:100',
    			], $messages);

    		if ($validator->fails()) {
    			return redirect()->route('sliderEdit',['slider' => $input['id']])
    							->withErrors($validator)->withInput();
    		}

    		if($request->hasFile('img')) {
              $file = $request->file('img');
              if ($file->isValid()) {
	           	$str = str_random(8);
				$imgname = $str.'.jpg';
				$img = Image::make($file);
				$img->fit(Config::get('settings.slider_image')['width'],
					Config::get('settings.slider_image')['height'])->save(public_path().'/assets/images/slider/'.$imgname);
				$input['img'] = $imgname;
            	}
	        }
	        
	        $slider->fill($input);

	        if ($slider->update()) {
	        	return redirect('admin')->with('status','Done with updating slide');
	        }

    	}

    	$old = $slider->toArray();

    	if (view()->exists('admin.slider_edit')) {

    		$data = [
    			'title' => 'Editing Slide '.$old['title'],
    			'data' => $old
    		];

    		return view('admin.slider_edit', $data);
    	}
    	abort(404);
    }

    public function mexecute(Slider $slider, Request $request) {

        if ($request->isMethod('delete')) {
            
            $slider->delete();
            return redirect('manager')->with('status','Slide deleted');
        }

        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');

            $messages = [
                'required' => 'Поле :attribute обязательно к заполнению'
            ];

            $validator = Validator::make($input,[
                    'title' => 'required|max:100',
                    'text' => 'required|max:100',
                    'img' => 'max:100',
                ], $messages);

            if ($validator->fails()) {
                return redirect()->route('msliderEdit',['slider' => $input['id']])
                                ->withErrors($validator)->withInput();
            }

            if($request->hasFile('img')) {
              $file = $request->file('img');
              if ($file->isValid()) {
                $str = str_random(8);
                $imgname = $str.'.jpg';
                $img = Image::make($file);
                $img->fit(Config::get('settings.slider_image')['width'],
                    Config::get('settings.slider_image')['height'])->save(public_path().'/assets/images/slider/'.$imgname);
                $input['img'] = $imgname;
                }
            }
            
            $slider->fill($input);

            if ($slider->update()) {
                return redirect('manager')->with('status','Done with updating slide');
            }

        }

        $old = $slider->toArray();

        if (view()->exists('manager.slider_edit')) {

            $data = [
                'title' => 'Editing Slide '.$old['title'],
                'data' => $old
            ];

            return view('manager.slider_edit', $data);
        }
        abort(404);
    }
}
