<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Portfolio;

use Validator;
use Image;
use Config;

class PortfolioEditController extends Controller
{
    //
    public function execute(Portfolio $portfolio, Request $request) {

    	$tag_items = Portfolio::distinct()->pluck('mfilter')->all();

		$t_items = array();
		foreach ($tag_items as $key=>$tag_item) {
		    $tag = explode('|', $tag_item);
		    array_push($t_items, $tag );
		}
		$tags = array();
		foreach($t_items as $k=>$subArr){
		        $tags = array_unique(array_merge($tags,$subArr));
		} 

    	$old = $portfolio->toArray();

    	$filters = $portfolio->mfilter;
    	$filters =  explode('|', $filters);

    	$selected_filters = array();

    	foreach ($filters as $value) {
		    foreach ($tags as $tkey => $ivalue) {
		    	if ($ivalue == $value) {
		    		array_push($selected_filters, $tkey);
		    	}
		    }
		}
    	
		if ($request->isMethod('delete')) {
			$portfolio->delete();
			return redirect('admin')->with('status','Art destroyed');
		}

		if ($request->isMethod('post')) {
			
			$input = $request->except('_token');

			$input['mfilter'] = array();
			if(isset($input['mfilters'])) {
	    		foreach ($input['mfilters'] as $ivalue) {
		    		foreach ($tags as $tkey => $value) {
		    			if ($tkey == $ivalue) {
		    				array_push($input['mfilter'], $value);
		    			}
		    		}
		    	}
	    	}
	    	$input['mfilter'] = implode('|', $input['mfilter']);

			$validator = Validator::make($input,[
					'name' => 'required|max:200',
					'mfilter' => 'required|max:100'
				]);
			if ($validator->fails()) {
				
				return redirect()
						->route('portfolioEdit',['portfolio' => $input['id']])
						->withErrors($validator)->withInput();
			}


			if($request->hasFile('images')) {
                $file = $request->file('images');
                if ($file->isValid()) {
	                $str = str_random(8);
	                $imgname = $str.'.jpg'; 
	                $img = Image::make($file);
	                $img->fit(Config::get('settings.gallery_image')['width'],
	                        Config::get('settings.gallery_image')['height'])->save(public_path().'/assets/images/img-portfolio/'.$imgname);
	                $input['images'] = $imgname;
                }

            }

            $portfolio->fill($input);

            if ($portfolio->update()) {
            	
            	return redirect('admin')->with('status','Done with editing Art');
            }
            unset($input);

		}

    	if (view()->exists('admin.portfolio_edit')) {
    		
    		$data = [
    			'title' => 'Editing Art '.$old['name'],
    			'data' => $old,
    			'tags' => $tags,
    			'fselected' => $selected_filters
    		];

    		return view('admin.portfolio_edit',$data);
    	}
    	abort(404);
    }

    public function mexecute(Portfolio $portfolio, Request $request) {

    	$tag_items = Portfolio::distinct()->pluck('mfilter')->all();

		$t_items = array();
		foreach ($tag_items as $key=>$tag_item) {
		    $tag = explode('|', $tag_item);
		    array_push($t_items, $tag );
		}
		$tags = array();
		foreach($t_items as $k=>$subArr){
		        $tags = array_unique(array_merge($tags,$subArr));
		} 

    	$old = $portfolio->toArray();

    	$filters = $portfolio->mfilter;
    	$filters =  explode('|', $filters);

    	$selected_filters = array();

    	foreach ($filters as $value) {
		    foreach ($tags as $tkey => $ivalue) {
		    	if ($ivalue == $value) {
		    		array_push($selected_filters, $tkey);
		    	}
		    }
		}
    	
		if ($request->isMethod('delete')) {
			$portfolio->delete();
			return redirect('manager')->with('status','Art destroyed');
		}

		if ($request->isMethod('post')) {
			
			$input = $request->except('_token');

			$input['mfilter'] = array();
			if(isset($input['mfilters'])) {
	    		foreach ($input['mfilters'] as $ivalue) {
		    		foreach ($tags as $tkey => $value) {
		    			if ($tkey == $ivalue) {
		    				array_push($input['mfilter'], $value);
		    			}
		    		}
		    	}
	    	}
	    	$input['mfilter'] = implode('|', $input['mfilter']);

			$validator = Validator::make($input,[
					'name' => 'required|max:200',
					'mfilter' => 'required|max:100'
				]);
			if ($validator->fails()) {
				
				return redirect()
						->route('mportfolioEdit',['portfolio' => $input['id']])
						->withErrors($validator)->withInput();
			}


			if($request->hasFile('images')) {
                $file = $request->file('images');
                if ($file->isValid()) {
	                $str = str_random(8);
	                $imgname = $str.'.jpg'; 
	                $img = Image::make($file);
	                $img->fit(Config::get('settings.gallery_image')['width'],
	                        Config::get('settings.gallery_image')['height'])->save(public_path().'/assets/images/img-portfolio/'.$imgname);
	                $input['images'] = $imgname;
                }

            }

            $portfolio->fill($input);

            if ($portfolio->update()) {
            	
            	return redirect('manager')->with('status','Done with editing Art');
            }
            unset($input);

		}

    	if (view()->exists('manager.portfolio_edit')) {
    		
    		$data = [
    			'title' => 'Editing Art '.$old['name'],
    			'data' => $old,
    			'tags' => $tags,
    			'fselected' => $selected_filters
    		];

    		return view('manager.portfolio_edit',$data);
    	}
    	abort(404);
    }

}
