<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;

use Validator;
use Image;
use Config;

class ClientsAddController extends Controller
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
                    'position' => 'required|max:100',
    				'text' => 'required'
    			],$messages);
    		if ($validator->fails()) {
    			return redirect()->route('clientsAdd')->withErrors($validator)->withInput();
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

            }

            $client = new Client();

            $client->fill($input);

            if ($client->save()) {
            	return redirect('admin')->with('status','Done with new testimonial');
            }

    	}	

    if (view()->exists('admin.client_add')) {

    		$data = [
    			'title' => 'New testimonial'
    		];
    		
    		return view('admin.client_add', $data);
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
                    'position' => 'required|max:100',
                    'text' => 'required'
                ],$messages);
            if ($validator->fails()) {
                return redirect()->route('mclientsAdd')->withErrors($validator)->withInput();
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

            }

            $client = new Client();

            $client->fill($input);

            if ($client->save()) {
                return redirect('manager')->with('status','Done with new testimonial');
            }

        }   

    if (view()->exists('manager.client_add')) {

            $data = [
                'title' => 'New testimonial'
            ];
            
            return view('manager.client_add', $data);
        }
    abort(404);

    }
}
