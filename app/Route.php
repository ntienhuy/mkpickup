<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Route extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'routes';

    protected $fillable = ['idLocationFrm', 'nameFrm', 'idLocationTo', 'nameTo', 'duration', 'length', 'price', 'carType', 'updated_at'];

    public static function getItemsById($id){
        return \DB::select('select *, R.id as routeId from routes R join carTypes C on R.carType = C.id where R.id = ?', [$id]);

    }
    public static function getItemsAll(){
        return \DB::select('select *, R.id as routeId from routes R join carTypes C on R.carType = C.id');

    }

    public static function findRoute($locationFrom, $locationTo){
        return \DB::select('select *, R.id as routeId from routes R join carTypes C on R.carType = C.id where R.idLocationFrm =? AND R.idLocationTo =?',[$locationFrom, $locationTo]);
    }


}
