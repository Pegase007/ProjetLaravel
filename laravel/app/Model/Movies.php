<?php
namespace App\Model;

/*
 *
 */
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movies extends Model
{

    use SoftDeletes;

    public $timestamps=false;

    /**
     * Ma table movies represente la classe movies
     * @var string
     */
    protected $table='movies';

//    public $timestamps = false;

    protected $dates =['deleted_at'];




    public function categories(){


        return $this->belongsTo('App\Model\Categories');



    }

    public function actors(){

        return $this->hasMany('App\Model\Actors');

    }


    public function directors()
    {
        return $this->belongsToMany('App\Model\Directors');
    }




    public function comments(){

        return $this->hasMany('App\Model\Comments');

    }





}