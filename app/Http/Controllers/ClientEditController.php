<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use Validator;
use Image;
use Config;

class ClientEditController extends Controller
{
    //
	public function execute(Client $client, Request $request) {

		if ($request->isMethod('delete')) {
    		
    		$client->delete();
    		return redirect('admin')->with('status','Testimonial deleted');
    	}

		if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно к заполнению'
    		];

    		$validator = Validator::make($input,[
    				'name' => 'required|max:100',
    				'position' => 'required|max:100',
    				'text' => 'required'
    			], $messages);

    		if ($validator->fails()) {
    			return redirect()->route('clientEdit',['client' => $input['id']])
    							->withErrors($validator)->withInput();
    		}

    		if($request->hasFile('images')) {
              $file = $request->file('images');
              if ($file->isValid()) {
	           	$str = str_random(8);
				$imgname = $str.'.jpg';
				$img = Image::make($file);
				$img->fit(Config::get('settings.clients_image')['width'],
					Config::get('settings.clients_image')['height'])->save(public_path().'/assets/images/clients/'.$imgname);
				$input['images'] = $imgname;
            	}
	        } else {

	            $input['images'] =  (!empty($input['old_images'])) ?  $input['old_images'] : '';
	        }
	        
	        unset($input['old_images']);

	        $client->fill($input);

	        if ($client->update()) {
	        	return redirect('admin')->with('status','Done with updating testimonial');
	        }

    	}

		$old = $client->toArray();

    	if (view()->exists('admin.client_edit')) {

    		$data = [
    			'title' => 'Editing testimonial from '.$old['name'],
    			'data' => $old
    		];

    		return view('admin.client_edit', $data);
    	}
    	abort(404);

	}

    public function mexecute(Client $client, Request $request) {

        if ($request->isMethod('delete')) {
            
            $client->delete();
            return redirect('manager')->with('status','Testimonial deleted');
        }

        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');

            $messages = [
                'required' => 'Поле :attribute обязательно к заполнению'
            ];

            $validator = Validator::make($input,[
                    'name' => 'required|max:100',
                    'position' => 'required|max:100',
                    'text' => 'required'
                ], $messages);

            if ($validator->fails()) {
                return redirect()->route('mclientEdit',['client' => $input['id']])
                                ->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')) {
              $file = $request->file('images');
              if ($file->isValid()) {
                $str = str_random(8);
                $imgname = $str.'.jpg';
                $img = Image::make($file);
                $img->fit(Config::get('settings.clients_image')['width'],
                    Config::get('settings.clients_image')['height'])->save(public_path().'/assets/images/clients/'.$imgname);
                $input['images'] = $imgname;
                }
            } else {

                $input['images'] =  (!empty($input['old_images'])) ?  $input['old_images'] : '';
            }
            
            unset($input['old_images']);

            $client->fill($input);

            if ($client->update()) {
                return redirect('manager')->with('status','Done with updating testimonial');
            }

        }

        $old = $client->toArray();

        if (view()->exists('manager.client_edit')) {

            $data = [
                'title' => 'Editing testimonial from '.$old['name'],
                'data' => $old
            ];

            return view('manager.client_edit', $data);
        }
        abort(404);

    }

}
