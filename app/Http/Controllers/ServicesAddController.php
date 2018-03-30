<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;

use Validator;
use Image;
use Config;

class ServicesAddController extends Controller
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
    				'alias' => 'required|max:100',
    				'text' => 'required'
    			],$messages);
    		if ($validator->fails()) {
    			return redirect()->route('servicesAdd')->withErrors($validator)->withInput();
    		}

    		if($request->hasFile('images')) {

                $file = $request->file('images');

                if ($file->isValid()) {

                $str = str_random(8);

                $imgname = $str.'.jpg'; 

                $img = Image::make($file);

                $img->fit(Config::get('settings.service_image')['width'],
                        Config::get('settings.service_image')['height'])->save(public_path().'/assets/images/'.$imgname);

                $input['images'] = $imgname;

                }

            }

            $service = new Service();

            $service->fill($input);

            if ($service->save()) {
            	
            	return redirect('admin')->with('status','Done with new Service');

            }

    	}

    	if (view()->exists('admin.service_add')) {

    		$srvcount = count(Service::select('id')->get());
    		$chunks = count(Service::all()->chunk(3));

    		if ($chunks%2 == 0) {
    			if ($srvcount%$chunks == 0 ) {
    				$add = 'icn';
    			} else {
    				$add = 'img';
    			}
    		} else {
    			if ($srvcount%$chunks == 0 ) {
    				$add = 'img';
    			} else {
    				$add = 'icn';
    			}
    		}

    		$data = [
    			'title' => 'New service',
    			'add' => $add
    		];

    		return view('admin.service_add', $data);
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
                    'alias' => 'required|max:100',
                    'text' => 'required'
                ],$messages);
            if ($validator->fails()) {
                return redirect()->route('mservicesAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')) {

                $file = $request->file('images');

                if ($file->isValid()) {

                $str = str_random(8);

                $imgname = $str.'.jpg'; 

                $img = Image::make($file);

                $img->fit(Config::get('settings.service_image')['width'],
                        Config::get('settings.service_image')['height'])->save(public_path().'/assets/images/'.$imgname);

                $input['images'] = $imgname;

                }

            }

            $service = new Service();
// dd($input);
            $service->fill($input);

            if ($service->save()) {
                
                return redirect('manager')->with('status','Done with new Service');

            }

        }

        if (view()->exists('manager.service_add')) {

            $srvcount = count(Service::select('id')->get());
            $chunks = count(Service::all()->chunk(3));

            if ($chunks%2 == 0) {
                if ($srvcount%$chunks == 0 ) {
                    $add = 'icn';
                } else {
                    $add = 'img';
                }
            } else {
                if ($srvcount%$chunks == 0 ) {
                    $add = 'img';
                } else {
                    $add = 'icn';
                }
            }

            $data = [
                'title' => 'New service',
                'add' => $add
            ];

            return view('manager.service_add', $data);
        }
        abort(404);

    }

}
