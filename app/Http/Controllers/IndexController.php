<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Client;
use App\Slider;
use App\Page;
use App\People;
use App\Portfolio;
use App\Price;
use App\Service;
use App\Stat;
use App\Subpage;
use Mail;

// use App\helpers.php;

class IndexController extends Controller
{
    //
    public function execute(Request $request) {

        if($request->isMethod('post')) {
                        
                        

                        $this->validate($request,[
                        'name' => 'required|max:255',
                        'email' => 'required|email',
                        'text' => 'required'
                        ], $messages);

                        $data = $request->all();

                        $result = Mail::send('site.email',['data'=>$data], function($message) use ($data) {

                                $mail_admin = 'iv.garin@gmail.com';
                                $message->from($data['email'],$data['name']);
                                $message->to($mail_admin,'Mr. Admin')->subject('Question');
                        });

                        if($result) {
                            return redirect()->route('home')->with('status', 'Email is sent');
                        }
                        //mail
        }


    	$clients = Client::take(config('settings.clients_qnty'))->orderBy('created_at','desc')->get();
    	$sliders = Slider::all();
    	$peoples = People:: all(); //orderBy('created_at','desc')->get();
    	$portfolios = Portfolio::take(config('settings.gallery_qnty'))->orderBy('created_at','desc')->get(array('mfilter', 'images'));
    	$prices = Price::take(config('settings.tariffs_qnty'))->orderBy('position','asc')->get();
    	$services = Service::all();
    	$stats = Stat::take(4)->orderBy('created_at','desc')->get();
    	$pages = Page::with('subpages')->get();
    	        
    	$tag_items = Portfolio::distinct()->pluck('mfilter')->all();

        $t_items = array();
        foreach ($tag_items as $tag_item) {
            $tag = explode('|', $tag_item);
            array_push($t_items, $tag);
        }

        $tags = array();
            foreach($t_items as $subArr){
            $tags = array_unique(array_merge($tags,$subArr));
        }  
       
    	$menu = array();

    	$item = array('title'=>'Home', 'alias'=>'slider');
    	array_push($menu, $item);

    	foreach ($pages as $page) {
    		$item = array('title'=>$page->name, 'alias'=>$page->alias);
    		array_push($menu,$item);
    	}

    	$item = array('title'=>'Services', 'alias'=>'services');
    	array_push($menu, $item);

    	$item = array('title'=>'Menu', 'alias'=>'menuCard');
    	array_push($menu, $item);

    	$item = array('title'=>'Gallery', 'alias'=>'portfolio');
    	array_push($menu, $item);

        // $item = array('title'=>'Stats', 'alias'=>'info');
        // array_push($menu, $item);

    	$item = array('title'=>'Chefs', 'alias'=>'team');
    	array_push($menu, $item);

    	$item = array('title'=>'Feedback', 'alias'=>'clients');
    	array_push($menu, $item);

    	$item = array('title'=>'Contact Us', 'alias'=>'contact');
    	array_push($menu, $item);

    	return view('site.index',array(

    		'menu' => $menu,
    		'sliders' => $sliders,
    		'pages' => $pages,
    		'services' => $services,
    		'prices' => $prices,
            'portfolios' => $portfolios,
    		'stats' => $stats,
    		'peoples' => $peoples,
    		'clients' => $clients,
    		'tags' => $tags

    		));

    }

}
