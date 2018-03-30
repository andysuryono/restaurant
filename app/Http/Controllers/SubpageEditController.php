<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subpage;
use App\Page;

use Validator;

class SubpageEditController extends Controller
{
    //
    public function execute(Subpage $subpage, Request $request) {

    	if ($request->isMethod('delete')) {
    		
    		$subpage->delete();

    		return redirect('admin')->with('status', 'Subpage destroyed');
    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->toArray();

    		$messages = [
    			'required' => 'Поле :attribute обязательно к заполнению'
    		];

    		$validator = Validator::make($input, [
    				'title' => 'required|max:100',
    				'text' => 'required'
    			], $messages);

    		if ($validator->fails()) {
    			
    			return redirect()->route('subpageEdit',['subpage' => $input['id']])->withErrors($validator);
    		}

    		$subpage->fill($input);

    		if ($subpage->update()) {
    			return redirect('admin')->with('status', 'Subpage updated');
    		}
    	}

    	$old = $subpage->toArray();

    	if (view()->exists('admin.subpage_edit')) {

    		$pages = Page::with('subpages')->get();

    		$list = array();

	    		foreach ($pages as $page) {
    				$list[$pages->where('id',$page->id)->first()->id] = $page->name;
    			}
    		
    		$data = [
    			'title' => 'Editing subpage '.$old['title'],
    			'data' => $old,
    			'parents' => $list
    		];

    		return view('admin.subpage_edit',$data);
    	}
    	abort(404);

    }

    public function mexecute(Subpage $subpage, Request $request) {

        if ($request->isMethod('delete')) {
            
            $subpage->delete();

            return redirect('manager')->with('status', 'Subpage destroyed');
        }

        if ($request->isMethod('post')) {
            
            $input = $request->toArray();

            $messages = [
                'required' => 'Поле :attribute обязательно к заполнению'
            ];

            $validator = Validator::make($input, [
                    'title' => 'required|max:100',
                    'text' => 'required'
                ], $messages);

            if ($validator->fails()) {
                
                return redirect()->route('msubpageEdit',['subpage' => $input['id']])->withErrors($validator);
            }

            $subpage->fill($input);

            if ($subpage->update()) {
                return redirect('manager')->with('status', 'Subpage updated');
            }
        }

        $old = $subpage->toArray();

        if (view()->exists('manager.subpage_edit')) {

            $pages = Page::with('subpages')->get();

            $list = array();

                foreach ($pages as $page) {
                    $list[$pages->where('id',$page->id)->first()->id] = $page->name;
                }
            
            $data = [
                'title' => 'Editing subpage '.$old['title'],
                'data' => $old,
                'parents' => $list
            ];

            return view('manager.subpage_edit',$data);
        }
        abort(404);

    }
}
