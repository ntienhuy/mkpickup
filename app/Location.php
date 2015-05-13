<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Location extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations';

    public static function getLocations(){
        return \DB::select('select * from locations');

    }


}
