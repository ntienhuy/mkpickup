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
        $routes = App\Route::getItemsById(1);
        $locations = App\Location::getLocations();
        $carTypes = App\CarTypes::getAll();
        return view('manage.home',compact('routes','locations','carTypes'));
    }

}
