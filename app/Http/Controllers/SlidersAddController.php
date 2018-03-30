<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider;

use Validator;
use Image;
use Config;

class SlidersAddController extends Controller
{
    //
	public function execute(Request $request)  {

	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute должно быть заполнено'
    		];

    		$validator = Validator::make($input, [
    				'title' => 'required|max:100',
    				'text' => 'required|max:100'
    			],$messages);
    		if ($validator->fails()) {
    			return redirect()->route('slidersAdd')->withErrors($validator)->withInput();
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

            $slider = new Slider();

            $slider->fill($input);

            if ($slider->save()) {
            	return redirect('admin')->with('status','Done with new Slide');
            }

    	}	

    if (view()->exists('admin.slider_add')) {

    		$data = [
    			'title' => 'New Slide'
    		];
    		
    		return view('admin.slider_add', $data);
    	}
    	abort(404);

    }

    public function mexecute(Request $request)  {

    if ($request->isMethod('post')) {
            
            $input = $request->except('_token');


            // dump($input);
            $messages = [
                'required' => 'Поле :attribute должно быть заполнено'
            ];

            $validator = Validator::make($input, [
                    'title' => 'required|max:100',
                    'text' => 'required|max:100'
                ],$messages);
            if ($validator->fails()) {
                return redirect()->route('mslidersAdd')->withErrors($validator)->withInput();
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

            $slider = new Slider();

            $slider->fill($input);

            if ($slider->save()) {
                return redirect('manager')->with('status','Done with new Slide');
            }

        }   

    if (view()->exists('manager.slider_add')) {

            $data = [
                'title' => 'New Slide'
            ];
            
            return view('manager.slider_add', $data);
        }
        abort(404);

    }
}
