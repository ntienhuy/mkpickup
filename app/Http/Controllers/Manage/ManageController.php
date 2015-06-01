<?php namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App;
class ManageController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {

        $routes = App\Route::getItemsAll();
        $locations = App\Location::getLocations();
        $carTypes = App\CarTypes::getAll();
        return view('manage.home',compact('routes','locations','carTypes'));
    }
    public function add()
    {
        $input = \Request::all();
        $input['updated_at'] = \Carbon\Carbon::now();
        $route =   App\Route::create($input);
        return $route;
    }

    public function del(){
        $input = \Request::all();
        $routeId = $input["routeId"];
        App\Route::destroy($routeId);
        return 1;
    }

    public function update(){
        $input = \Request::all();
        $routeId = $input["routeId"];
        $price = $input["price"];
        $route = \App\Route::find( $routeId);
        $route->price = $price;
        $route->save();
        return 1;
    }


}
