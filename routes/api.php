<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
	//return $request->all();
    //return $request->user();
})->middleware('auth:api');

Route::group([
		'prefix'     => 'v1',
	], function() {

	//Login-vista
	Route::get('login', function(){
		return redirect('login');
	});

	//Login-post
	Route::post('login', '\App\Http\Controllers\Auth\LoginController@login');
	//Logout
	Route::any('logout', function(){ auth()->logout(); \Session::flush(); \Session::regenerate(); return redirect()->intended(config('rules_route.base_sindi').'login'); });
});

//Dingo API
/*$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['middleware' => 'api.auth'], function ($api) {
    	//Accept: application/x.friedman.v1+json
    	//Example: CURL: curl -v -H "Accept: application/x.friedman.v1+json" http://friedman.dev/api/test
        $api->get('test', function () {
        	return 'hola';

	        //Usuario autenticado
	        //$user = app('Dingo\Api\Auth\Auth')->user();

	        //return $user;
	    });

	    $api->post('test', function (Request $request) {
	    	return $request->all();
	    });
    });

});*/

/*$api->version('v1', ['middleware' => 'api.throttle', 'limit' => 100, 'expires' => 5], function ($api) {
	//Esta ruta se puede visitar 100 veces por el usuario
	//con un tiempo de 5 minutos
});*/