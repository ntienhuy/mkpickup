<?php namespace App;

use Illuminate\Database\Eloquent\Model;


class Route extends Model  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'routes';

    public static function getItemsById($id){
        return \DB::select('select * from routes R join carTypes C on R.carType = C.id where R.id = ?', [$id]);

    }


}
