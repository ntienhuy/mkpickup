<?php namespace App\Http\Controllers;
use App;
use App\Http\Controllers\Controller;

class ShowRouteController extends Controller {

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
        $routes = null;
        $locations = App\Location::getLocations();
        $fromLocation = null;
        $toLocation = null;
        $date = null;
        if(isset($input['locationFrom']) && isset($input['locationTo']) && isset($input['date']) ) {
            $fromLocation = App\Location::find($input['locationFrom'])->name;
            $toLocation = App\Location::find($input['locationTo'])->name;
            $routes = App\Route::findRoute($input['locationFrom'], $input['locationTo']);
            $date = $input['date'];

        }

        return view('showRoute',compact('routes','locations','fromLocation','toLocation','date'));
    }

}
