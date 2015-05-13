<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class CarTypes extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'carTypes';

    public static function  getAll(){
        return \DB::select('select * from carTypes');
    }



}
