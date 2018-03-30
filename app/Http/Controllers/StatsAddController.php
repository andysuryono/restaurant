<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stat;

use Validator;

class StatsAddController extends Controller
{
    //
	public function execute(Stat $stat, Request $request) {

		if ($request->isMethod('post')) {
			
			$input = $request->except('_token');

			$validator = Validator::make($input,[
					'name' => 'required|max:100',
					'meters' => 'required'
				]);
			if ($validator->fails()) {
				
				return redirect()->route('statsAdd')->withErrors($validator)->withInput();
			}

			$stat = new Stat();

			$stat->fill($input);

			if ($stat->save()) {
				
				return redirect('admin')->with('status','Done with new Meter');
			}


		}

		if (view()->exists('admin.stat_add')) {
			
			$data = [
				'title' => 'New Meter'
			];

			return view('admin.stat_add',$data);
		}
		abort(404);
	}

	public function mexecute(Stat $stat, Request $request) {

		if ($request->isMethod('post')) {
			
			$input = $request->except('_token');

			$validator = Validator::make($input,[
					'name' => 'required|max:100',
					'meters' => 'required'
				]);
			if ($validator->fails()) {
				
				return redirect()->route('mstatsAdd')->withErrors($validator)->withInput();
			}

			$stat = new Stat();

			$stat->fill($input);

			if ($stat->save()) {
				
				return redirect('manager')->with('status','Done with new Meter');
			}


		}

		if (view()->exists('manager.stat_add')) {
			
			$data = [
				'title' => 'New Meter'
			];

			return view('manager.stat_add',$data);
		}
		abort(404);
	}

}
