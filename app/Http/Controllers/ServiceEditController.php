<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;
use Validator;
use Image;
use Config;

class ServiceEditController extends Controller
{
    //
    public function execute(Service $service, Request $request) {

    	if ($request->isMethod('delete')) {
    		
    		$service->delete();
    		return redirect('admin')->with('status','Service destroyed');
    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно к заполнению'
    		];

    		$validator = Validator::make($input,[
                    'name' => 'required|max:100',
    				'alias' => 'required|max:100',
    				'text' => 'required'
    			], $messages);

    		if ($validator->fails()) {
    			return redirect()->route('serviceEdit',['service' => $input['id']])
    							->withErrors($validator)->withInput();
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
	        } else {

	            $input['images'] =  (!empty($input['old_images'])) ?  $input['old_images'] : '';
	        }
	        
	        unset($input['old_images']);

	        $service->fill($input);

	        if ($service->update()) {
	        	return redirect('admin')->with('status','Done with updating service');
	        }

    	}

        $old = $service->toArray();

    	if (view()->exists('admin.service_edit')) {

    		$data = [
    			'title' => 'Editing Service '.$old['name'],
    			'data' => $old
    		];

    		return view('admin.service_edit', $data);
    	}
    	abort(404);
    }

    public function mexecute(Service $service, Request $request) {

        if ($request->isMethod('delete')) {
            
            $service->delete();
            return redirect('manager')->with('status','Service destroyed');
        }

        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');

            $messages = [
                'required' => 'Поле :attribute обязательно к заполнению'
            ];

            $validator = Validator::make($input,[
                    'name' => 'required|max:100',
                    'alias' => 'required|max:100',
                    'text' => 'required'
                ], $messages);

            if ($validator->fails()) {
                return redirect()->route('mserviceEdit',['service' => $input['id']])
                                ->withErrors($validator)->withInput();
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
            } else {

                $input['images'] =  (!empty($input['old_images'])) ?  $input['old_images'] : '';
            }
            
            unset($input['old_images']);

            $service->fill($input);

            if ($service->update()) {
                return redirect('manager')->with('status','Done with updating service');
            }

        }

        $old = $service->toArray();

        if (view()->exists('manager.service_edit')) {

            $data = [
                'title' => 'Editing Service '.$old['name'],
                'data' => $old
            ];

            return view('manager.service_edit', $data);
        }
        abort(404);
    }
}
