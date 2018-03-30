<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stat;
use Validator;
use Config;

class StatEditController extends Controller
{
    //
    public function execute(Stat $stat, Request $request) {

    	if ($request->isMethod('delete')) {
    		$stat->delete();
    		return redirect('admin')->with('status','Meter deleted');
    	}

    	if ($request->isMethod('post')) {
    		
    		$input = $request->except('_token');

    		$validator = Validator::make($input,[
    				'name' => 'required|max:100',
    				'icon' => 'required',
    				// 'meters' => 'required'
    			]);
    		if ($validator->fails()) {
    			
    			return redirect()->route('statEdit',['stat' => $input['id']])
    							->withErrors($validator)->withInput();
    		}

    		$stat->fill($input);

	        if ($stat->update()) {
	        	return redirect('admin')->with('status','Done with updating Meter');
	        }

    	}

        $old = $stat->toArray();

    	if (view()->exists('admin.stat_edit')) {

    		$data = [
    			'title' => 'Editing Meter '.$old['name'],
    			'data' => $old
    		];

    		return view('admin.stat_edit', $data);
    	}
    	abort(404);

    }

    public function mexecute(Stat $stat, Request $request) {

        if ($request->isMethod('delete')) {
            $stat->delete();
            return redirect('manager')->with('status','Meter deleted');
        }

        if ($request->isMethod('post')) {
            
            $input = $request->except('_token');

            $validator = Validator::make($input,[
                    'name' => 'required|max:100',
                    'icon' => 'required',
                    // 'meters' => 'required'
                ]);
            if ($validator->fails()) {
                
                return redirect()->route('mstatEdit',['stat' => $input['id']])
                                ->withErrors($validator)->withInput();
            }

            $stat->fill($input);

            if ($stat->update()) {
                return redirect('manager')->with('status','Done with updating Meter');
            }

        }

        $old = $stat->toArray();

        if (view()->exists('manager.stat_edit')) {

            $data = [
                'title' => 'Editing Meter '.$old['name'],
                'data' => $old
            ];

            return view('manager.stat_edit', $data);
        }
        abort(404);

    }

}
