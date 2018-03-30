<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Subpage;
use App\Page;

class SubpagesAddController extends Controller
{
    //
    public function execute(Request $request) {

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$validator = Validator::make($input,[
    			'title' => 'required|max:100',
    			'text' =>'required'
    			]);


    		if ($validator->fails()) {
    			return redirect()->route('subpagesAdd')->withErrors($validator)->withInput();
    		}

    		$subpage = new Subpage();

    		$subpage->fill($input);

    		if ($subpage->save()) {
    			return redirect('admin')->with('status', 'Done with new subpage');
    		}

    	}

    	if (view()->exists('admin.subpages_add')) {

    		$pages = Page::with('subpages')->get();
    		$list = array();

	    		foreach ($pages as $page) {
    				$list[$pages->where('id',$page->id)->first()->id] = $page->name;
    			}
    		
    		$data = [
    			'title' => 'New Subpage',
    			'parents' => $list
    		];
    		
    		return view('admin.subpages_add', $data);
    	}
    	abort(404);

    }

    public function mexecute(Request $request) {

        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');

            $validator = Validator::make($input,[
                'title' => 'required|max:100',
                'text' =>'required'
                ]);

            if ($validator->fails()) {
                return redirect()->route('msubpagesAdd')->withErrors($validator)->withInput();
            }

            $subpage = new Subpage();

            $subpage->fill($input);

            if ($subpage->save()) {
                return redirect('manager')->with('status', 'Done with new subpage');
            }

        }

        if (view()->exists('manager.subpages_add')) {

            $pages = Page::with('subpages')->get();
            $list = array();

                foreach ($pages as $page) {
                    $list[$pages->where('id',$page->id)->first()->id] = $page->name;
                }
            
            $data = [
                'title' => 'New Subpage',
                'parents' => $list
            ];
            
            return view('manager.subpages_add', $data);
        }
        abort(404);

    }
}
