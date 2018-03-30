<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;

use Validator;
use Image;
use Config;

class PeoplesAddController extends Controller
{
    //
    public function execute(Request $request) {

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute должно быть заполнено'
    		];

    		$validator = Validator::make($input, [
    				'name' => 'required|max:100',
    				'text' => 'required'
    			],$messages);
    		if ($validator->fails()) {
    			return redirect()->route('peoplesAdd')->withErrors($validator)->withInput();
    		}

    		if($request->hasFile('images')) {
                $file = $request->file('images');
                if ($file->isValid()) {
                $str = str_random(8);
                $imgname = $str.'.jpg'; 
                $img = Image::make($file);
                $img->fit(Config::get('settings.people_image')['width'],
                        Config::get('settings.people_image')['height'])->save(public_path().'/assets/images/img-teams/'.$imgname);

                $input['images'] = $imgname;
                }

            }

            $people = new People();

            $people->fill($input);

            if ($people->save()) {
            	return redirect('admin')->with('status','Done with new Chief');
            }

    	}


    	if (view()->exists('admin.people_add')) {

    		$data = [
    			'title' => 'New Chief'
    		];
    		
    		return view('admin.people_add', $data);
    	}
    	abort(404);

    }

    public function mexecute(Request $request) {

        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');

            $messages = [
                'required' => 'Поле :attribute должно быть заполнено'
            ];

            $validator = Validator::make($input, [
                    'name' => 'required|max:100',
                    'text' => 'required',
                    'alias' => 'required|unique:peoples'
                ],$messages);
            if ($validator->fails()) {
                return redirect()->route('mpeoplesAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')) {
                $file = $request->file('images');
                if ($file->isValid()) {
                $str = str_random(8);
                $imgname = $str.'.jpg'; 
                $img = Image::make($file);
                $img->fit(Config::get('settings.people_image')['width'],
                        Config::get('settings.people_image')['height'])->save(public_path().'/assets/images/img-teams/'.$imgname);

                $input['images'] = $imgname;
                }

            }

            $people = new People();

            $people->fill($input);

            if ($people->save()) {
                return redirect('manager')->with('status','Done with new Chief');
            }

        }


        if (view()->exists('manager.people_add')) {

            $data = [
                'title' => 'New Chief'
            ];
            
            return view('manager.people_add', $data);
        }
        abort(404);

    }

}
