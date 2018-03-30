<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;
use Validator;
use Image;
use Config;

class PeopleEditController extends Controller
{
    //
    public function execute(People $people, Request $request) {

    	if ($request->isMethod('delete')) {
    		
    		$people->delete();
    		return redirect('admin')->with('status','Chief deleted');
    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
    			'required' => 'Поле :attribute обязательно к заполнению'
    		];

    		$validator = Validator::make($input,[
    				'name' => 'required|max:100',
    				'text' => 'required',
                    'alias' => 'required|unique:peoples,alias,'.$input['id']
    			], $messages);

    		if ($validator->fails()) {
    			return redirect()
                        ->route('peopleEdit',['people' => $input['id']])
    					->withErrors($validator)->withInput();
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
	        } else {

	            $input['images'] =  (!empty($input['old_images'])) ?  $input['old_images'] : '';
	        }
	        
	        unset($input['old_images']);

	        $people->fill($input);

	        if ($people->update()) {
	        	return redirect('admin')->with('status','Done with updating Chief');
	        }

    	}


    	$old = $people->toArray();

    	if (view()->exists('admin.people_edit')) {

    		$data = [
    			'title' => 'Editing Chief '.$old['name'],
    			'data' => $old
    		];

    		return view('admin.people_edit', $data);
    	}
    	abort(404);

    }

    public function mexecute(People $people, Request $request) {

        if ($request->isMethod('delete')) {
            
            $people->delete();
            return redirect('manager')->with('status','Chief deleted');
        }

        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');

            $messages = [
                'required' => 'Поле :attribute обязательно к заполнению'
            ];

            $validator = Validator::make($input,[
                    'name' => 'required|max:100',
                    'text' => 'required',
                    'alias' => 'required|unique:peoples,alias,'.$input['id']
                ], $messages);

            if ($validator->fails()) {
                return redirect()->route('mpeopleEdit',['people' => $input['id']])
                                ->withErrors($validator)->withInput();
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
            } else {

                $input['images'] =  (!empty($input['old_images'])) ?  $input['old_images'] : '';
            }
            
            unset($input['old_images']);

            $people->fill($input);

            if ($people->update()) {
                return redirect('manager')->with('status','Done with updating Chief');
            }

        }

        $old = $people->toArray();

        if (view()->exists('manager.people_edit')) {

            $data = [
                'title' => 'Editing Chief '.$old['name'],
                'data' => $old
            ];

            return view('manager.people_edit', $data);
        }
        abort(404);

    }

}
