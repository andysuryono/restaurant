<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Page;

use Image;
use Config;

class PagesAddController extends Controller
{
    //
    public function execute(Request $request) {

        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');

            $validator = Validator::make($input,[
                    'name' => 'required|max:100',
                    'alias' => 'required|max:255|unique:pages',
                    'title' => 'required|max:100',
                    'text' => 'required|max:255'
                ]);

            if($validator->fails()) {
                return redirect()->route('pagesAdd')->withErrors($validator)->withInput();
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

            $page = new Page;

            $page->fill($input);

            if ($page->save()) {
                return redirect('admin')->with('status','Done with new Page');
            }

        }


    	if (view()->exists('admin.pages_add')) {
    		
    		$data = [
    			'title' => 'New Page'
    		];
    		return view('admin.pages_add',$data);
    	}

    	abort(404);

    }

    public function mexecute(Request $request) {

        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');

            $validator = Validator::make($input,[
                    'name' => 'required|max:100',
                    'alias' => 'required|max:255|unique:pages',
                    'title' => 'required|max:100',
                    'text' => 'required|max:255'
                ]);

            if($validator->fails()) {
                return redirect()->route('mpagesAdd')->withErrors($validator)->withInput();
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

            $page = new Page;

            $page->fill($input);

            if ($page->save()) {
                return redirect('manager')->with('status','Done with new Page');
            }

        }


        if (view()->exists('manager.pages_add')) {
            
            $data = [
                'title' => 'New Page'
            ];
            return view('manager.pages_add',$data);
        }

        abort(404);

    }
}
