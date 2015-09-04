<?php
namespace App\Model;

/*
 *
 */
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{

    /**
     * Ma table movies represente la classe movies
     * @var string
     */
    protected $table='movies';

//    public $timestamps = false;


    public function Categories(){


        return $this->belongsTo('App\Model\Categories','id','categories_id');



    }

}