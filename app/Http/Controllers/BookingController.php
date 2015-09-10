<?php
namespace App\Http\Controllers;
use Mail;
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
        $routeArray = array();
        $total = 0;
        foreach($input as $key => $value){
            if(substr($key,0,10) === "carNumber_" AND $value > 0){
                $idRoute = substr($key,10);
                $bookRoute = \App\Route::find($idRoute);
                $carTypeName = \App\CarTypes::find($bookRoute->carType)->name;
                $bookRoute->value = $value;
                $bookRoute->carTypeName = $carTypeName;
                $routeArray[] = $bookRoute;
                $total += $bookRoute->price * $value;
            }
        }

        $data = array("name"=>$input["name"], "phone"=>$input["phone"], "email"=>$input["email"],
                    "date"=>$input["date"], "address"=>$input["address"], "routeArray"=>$routeArray,
                    "total"=>$total, "nameFrm"=>$routeArray[0]->nameFrm, "nameTo"=>$routeArray[0]->nameTo);
        Mail::send('emails.booking',compact("data"), function($message) use ($data)
        {
            $message->to($data["email"], 'John Smith')->subject('[MKPickup]Thông tin đặt xe. Ngày ' . $data["date"]);
        });
        return view("emails.booking", compact("data"));

    }

}
