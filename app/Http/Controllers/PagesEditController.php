<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use Validator;
use Image;
use Config;

class PagesEditController extends Controller
{
    //
    public function execute(Page $page, Request $request) {

    	if ($request->isMethod('delete')) {
    		
    		$page->subpages()->delete();
    		$page->delete();

    		return redirect('admin')->with('status','Page destroyed');
    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$messages = [
                'required'=>'Поле :attribute обязательно к заполнению',
            ];

    		$validator = Validator::make($input,[
    				'name' => 'required|max:100',
    				'alias' => 'required|max:255|unique:pages,alias,'.$input['id'],
    				'title' => 'required|max:100',
    				'text' => 'required|max:255'
    			],$messages);

    		if ($validator->fails()) {
    			return redirect()
    				->route('pagesEdit',['page'=>$input['id']])
    				->withErrors($validator);
    		}

    		if($request->hasFile('images')) {
              $file = $request->file('images');
              if ($file->isValid()) {
	           	$str = str_random(8);
				$imgname = $str.'.jpg';
				$img = Image::make($file);
				$img->fit(Config::get('settings.pages_image')['width'],
					Config::get('settings.pages_image')['height'])->save(public_path().'/assets/images/'.$imgname);
				$input['images'] = $imgname;
            	}
	        }
	        else {

	            $input['images'] = $input['old_images'];
	        }
	        unset($input['old_images']);

	        $page->fill($input);

	        if ($page->update()) {
	        	return redirect('admin')->with('status','Page updated');
	        }

    	}

    	$old = $page->toArray();

    	$data = [
    		'title' => 'Editing Page ',
    		'data' => $old,
    	];

    	if (view()->exists('admin.pages_edit')) {
    		
    		return view('admin.pages_edit',$data);
    	}
        abort(404);
    	
    }

    public function mexecute(Page $page, Request $request) {

        if ($request->isMethod('delete')) {
            
            $page->subpages()->delete();
            $page->delete();

            return redirect('manager')->with('status','Page destroyed');
        }

        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');

            $messages = [
                'required'=>'Поле :attribute обязательно к заполнению',
            ];

            $validator = Validator::make($input,[
                    'name' => 'required|max:100',
                    'alias' => 'required|max:255|unique:pages,alias,'.$input['id'],
                    'title' => 'required|max:100',
                    'text' => 'required|max:255'
                ],$messages);

            if ($validator->fails()) {
                return redirect()
                    ->route('mpagesEdit',['page'=>$input['id']])
                    ->withErrors($validator);
            }

            if($request->hasFile('images')) {
              $file = $request->file('images');
              if ($file->isValid()) {
                $str = str_random(8);
                $imgname = $str.'.jpg';
                $img = Image::make($file);
                $img->fit(Config::get('settings.pages_image')['width'],
                    Config::get('settings.pages_image')['height'])->save(public_path().'/assets/images/'.$imgname);
                $input['images'] = $imgname;
                }
            }
            else {

                $input['images'] = $input['old_images'];
            }
            unset($input['old_images']);

            $page->fill($input);

            if ($page->update()) {
                return redirect('manager')->with('status','Page updated');
            }

        }

        $old = $page->toArray();

        $data = [
            'title' => 'Editing Page ',
            'data' => $old,
        ];

        if (view()->exists('manager.pages_edit')) {
            
            return view('manager.pages_edit',$data);
        }
        abort(404);
        
    }

}
