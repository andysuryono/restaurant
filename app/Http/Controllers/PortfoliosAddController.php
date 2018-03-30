<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Portfolio;

use Validator;
use Image;
use Config;

class PortfoliosAddController extends Controller
{
    //
    public function execute(Request $request) {

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
	    	if (!empty($input['newfilter'])) {
	    		array_push($input['mfilter'], $input['newfilter']);
	    	}
    		
    		$input['mfilter'] = implode('|', $input['mfilter']);

    		$validator = Validator::make($input,[
    				'name' => 'required|max:200',
    				'mfilter' => 'required|max:100',
    			]);

    		if ($validator->fails()) {
    			return redirect()->route('portfoliosAdd')->withErrors($validator)->withInput();
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
    		
    		$portfolio = new Portfolio();

    		$portfolio->fill($input);

    		if ($portfolio->save()) {
    			
    			return redirect('admin')->with('status','Done with new Art');
    		}
    		unset($input);
    	}

    	if (view()->exists('admin.portfolio_add')) {

	    	$data = [
	    		'title' => 'New Art',
	    		'tags' => $tags
	    	];

   			return view('admin.portfolio_add',$data);
    	}
    	abort(404);
    }

    public function mexecute(Request $request) {

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
            if (!empty($input['newfilter'])) {
                array_push($input['mfilter'], $input['newfilter']);
            }
            
            $input['mfilter'] = implode('|', $input['mfilter']);

            $validator = Validator::make($input,[
                    'name' => 'required|max:200',
                    'mfilter' => 'required|max:100',
                ]);

            if ($validator->fails()) {
                return redirect()->route('mportfoliosAdd')->withErrors($validator)->withInput();
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
            
            $portfolio = new Portfolio();

            $portfolio->fill($input);

            if ($portfolio->save()) {
                
                return redirect('manager')->with('status','Done with new Art');
            }
            unset($input);
        }

        if (view()->exists('manager.portfolio_add')) {

            $data = [
                'title' => 'New Art',
                'tags' => $tags
            ];

            return view('manager.portfolio_add',$data);
        }
        abort(404);
    }

}
