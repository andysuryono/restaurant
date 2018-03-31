<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/create', function(){
//    App\User::create([
//        'name' => 'SomeName',
//        'email' => 'some@mail',
//        'login' => 'somelogin',
//        'password' => bcrypt('SomePassword'),
//    ]);
// });


Route::group([], function() {
	//site
	Route::match(['get','post'], '/', ['uses'=>'IndexController@execute', 'as'=>'home']);
	Route::get('/service/{alias}', ['uses'=>'ServiceController@execute', 'as'=>'service']);
	Route::get('/people/{alias}', ['uses'=>'PeopleController@execute', 'as'=>'people']);

	//auth
	Route::auth();
	Route::get('/logout','Auth\LoginController@logout');

});

Route::group(['prefix'=>'manager', 'middleware'=>'auth'], function() {

	Route::get('/', function() {
		if (view()->exists('manager.index')) {
			$data = ['title' => 'Admin Panel',];
			return view('manager.index',$data);
		}
	});

	Route::group(['prefix'=>'sliders'], function() {
		Route::get('/',['uses'=>'SlidersController@mexecute', 'as'=>'msliders']);
		Route::match(['get','post'],'/add',['uses'=>'SlidersAddController@mexecute', 'as'=>'mslidersAdd']);
		Route::match(['get','post'],'/edit/{slider}',['uses'=>'SliderEditController@mexecute', 'as'=>'msliderEdit']);
		Route::match(['delete'],'/edit/{slider}',['uses'=>'SliderEditController@mexecute', 'as'=>'msliderDelete']);
	});

	Route::group(['prefix'=>'pages'], function() {
		Route::get('/',['uses'=>'PagesController@mexecute', 'as'=>'mpages']);
		Route::match(['get','post'],'/add',['uses'=>'PagesAddController@mexecute', 'as'=>'mpagesAdd']);
		Route::match(['get','post','delete'],'/edit/{page}',['uses'=>'PagesEditController@mexecute', 'as'=>'mpagesEdit']);
		
	});

	Route::group(['prefix'=>'subpages'], function() {
		Route::get('/',['uses'=>'SubpagesController@mexecute', 'as'=>'msubpages']);
		Route::match(['get','post'],'/add',['uses'=>'SubpagesAddController@mexecute', 'as'=>'msubpagesAdd']);
		Route::match(['get','post','delete'],'/edit/{subpage}',['uses'=>'SubpageEditController@mexecute', 'as'=>'msubpageEdit']);
	});

	Route::group(['prefix'=>'services'], function() {
		Route::get('/',['uses'=>'ServicesController@mexecute', 'as'=>'mservices']);
		Route::match(['get','post'],'/add',['uses'=>'ServicesAddController@mexecute', 'as'=>'mservicesAdd']);
		Route::match(['get','post','delete'],'/edit/{service}',['uses'=>'ServiceEditController@mexecute', 'as'=>'mserviceEdit']);
	});

	Route::group(['prefix'=>'prices'], function() {
		Route::get('/',['uses'=>'PricesController@mexecute', 'as'=>'mprices']);
		Route::match(['get','post'],'/add',['uses'=>'PricesAddController@mexecute', 'as'=>'mpricesAdd']);
		Route::match(['get','post','delete'],'/edit/{price}',['uses'=>'PriceEditController@mexecute', 'as'=>'mpriceEdit']);
	});

	Route::group(['prefix'=>'portfolios'], function() {
		Route::get('/',['uses'=>'PortfoliosController@mexecute', 'as'=>'mportfolios']);
		Route::match(['get','post'],'/add',['uses'=>'PortfoliosAddController@mexecute', 'as'=>'mportfoliosAdd']);
		Route::match(['get','post','delete'],'/edit/{portfolio}',['uses'=>'PortfolioEditController@mexecute', 'as'=>'mportfolioEdit']);
	});

	Route::group(['prefix'=>'stats'], function() {
		Route::get('/',['uses'=>'StatsController@mexecute', 'as'=>'mstats']);
		Route::match(['get','post'],'/add',['uses'=>'StatsAddController@mexecute', 'as'=>'mstatsAdd']);
		Route::match(['get','post','delete'],'/edit/{stat}',['uses'=>'StatEditController@mexecute', 'as'=>'mstatEdit']);
	});

	Route::group(['prefix'=>'peoples'], function() {
		Route::get('/',['uses'=>'PeoplesController@mexecute', 'as'=>'mpeoples']);
		Route::match(['get','post'],'/add',['uses'=>'PeoplesAddController@mexecute', 'as'=>'mpeoplesAdd']);
		Route::match(['get','post','delete'],'/edit/{people}',['uses'=>'PeopleEditController@mexecute', 'as'=>'mpeopleEdit']);
	});

	Route::group(['prefix'=>'clients'], function() {
		Route::get('/',['uses'=>'ClientsController@mexecute', 'as'=>'mclients']);
		Route::match(['get','post'],'/add',['uses'=>'ClientsAddController@mexecute', 'as'=>'mclientsAdd']);
		Route::match(['get','post','delete'],'/edit/{client}',['uses'=>'ClientEditController@mexecute', 'as'=>'mclientEdit']);
	});

});

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function() {

	Route::get('/', function() {

		if (view()->exists('admin.index')) {
			$data = ['title' => 'Admin Panel'];
			return view('admin.index',$data);
		}

	});

	Route::group(['prefix'=>'sliders'], function() {
		Route::get('/',['uses'=>'SlidersController@execute', 'as'=>'sliders']);
		Route::match(['get','post'],'/add',['uses'=>'SlidersAddController@execute', 'as'=>'slidersAdd']);
		Route::match(['get','post','delete'],'/edit/{slider}',['uses'=>'SliderEditController@execute', 'as'=>'sliderEdit']);
	});

	//admin/pages
	Route::group(['prefix'=>'pages'], function() {
		Route::get('/',['uses'=>'PagesController@execute', 'as'=>'pages']);
		Route::match(['get','post'],'/add',['uses'=>'PagesAddController@execute', 'as'=>'pagesAdd']);
		Route::match(['get','post','delete'],'/edit/{page}',['uses'=>'PagesEditController@execute', 'as'=>'pagesEdit']);
	});
	
	Route::group(['prefix'=>'subpages'], function() {
		Route::get('/',['uses'=>'SubpagesController@execute', 'as'=>'subpages']);
		Route::match(['get','post'],'/add',['uses'=>'SubpagesAddController@execute', 'as'=>'subpagesAdd']);
		Route::match(['get','post','delete'],'/edit/{subpage}',['uses'=>'SubpageEditController@execute', 'as'=>'subpageEdit']);
	});

	Route::group(['prefix'=>'services'], function() {
		Route::get('/',['uses'=>'ServicesController@execute', 'as'=>'services']);
		Route::match(['get','post'],'/add',['uses'=>'ServicesAddController@execute', 'as'=>'servicesAdd']);
		Route::match(['get','post','delete'],'/edit/{service}',['uses'=>'ServiceEditController@execute', 'as'=>'serviceEdit']);
	});

	Route::group(['prefix'=>'prices'], function() {
		Route::get('/',['uses'=>'PricesController@execute', 'as'=>'prices']);
		Route::match(['get','post'],'/add',['uses'=>'PricesAddController@execute', 'as'=>'pricesAdd']);
		Route::match(['get','post','delete'],'/edit/{price}',['uses'=>'PriceEditController@execute', 'as'=>'priceEdit']);
	});

	Route::group(['prefix'=>'portfolios'], function() {
		Route::get('/',['uses'=>'PortfoliosController@execute', 'as'=>'portfolios']);
		Route::match(['get','post'],'/add',['uses'=>'PortfoliosAddController@execute', 'as'=>'portfoliosAdd']);
		Route::match(['get','post','delete'],'/edit/{portfolio}',['uses'=>'PortfolioEditController@execute', 'as'=>'portfolioEdit']);
	});

	Route::group(['prefix'=>'stats'], function() {
		Route::get('/',['uses'=>'StatsController@execute', 'as'=>'stats']);
		Route::match(['get','post'],'/add',['uses'=>'StatsAddController@execute', 'as'=>'statsAdd']);
		Route::match(['get','post','delete'],'/edit/{stat}',['uses'=>'StatEditController@execute', 'as'=>'statEdit']);
	});

	Route::group(['prefix'=>'peoples'], function() {
		Route::get('/',['uses'=>'PeoplesController@execute', 'as'=>'peoples']);
		Route::match(['get','post'],'/add',['uses'=>'PeoplesAddController@execute', 'as'=>'peoplesAdd']);
		Route::match(['get','post','delete'],'/edit/{people}',['uses'=>'PeopleEditController@execute', 'as'=>'peopleEdit']);
	});

	Route::group(['prefix'=>'clients'], function() {
		Route::get('/',['uses'=>'ClientsController@execute', 'as'=>'clients']);
		Route::match(['get','post'],'/add',['uses'=>'ClientsAddController@execute', 'as'=>'clientsAdd']);
		Route::match(['get','post','delete'],'/edit/{client}',['uses'=>'ClientEditController@execute', 'as'=>'clientEdit']);
	});


});

Auth::routes();

Route::get('/home', 'HomeController@index');
