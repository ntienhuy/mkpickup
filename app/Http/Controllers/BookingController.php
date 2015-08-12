<?php
namespace App\Http\Controllers;
/**
 * Created by PhpStorm.
 * User: hung
 * Date: 7/27/15
 * Time: 2:16 PM
 */

class BookingController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Welcome Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders the "marketing page" for the application and
    | is configured to only allow guests. Like most of the other sample
    | controllers, you are free to modify or remove it as you desire.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        $input = \Request::all();
        $idRoute = $input["idRoute"];
        $bookRoute =  \App\Route::find($idRoute);
        $routes = \App\Route::findRouteWithDuration($bookRoute->idLocationFrm, $bookRoute->idLocationTo,$bookRoute->duration);
        $date = $input["date"];
        return view("booking",compact("bookRoute","routes","date"));
    }
    public function book()
    {
        $input = \Request::all();
        var_dump($input);
        die();

    }

}
