<?php
namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Directors_Movies extends Model
{

    /**
     * Ma table actors represente la classe actor
     * @var string
     */
    protected $table='directors_movies';

    /**
     * @var bool
     */
    public function movies(){

        return $this->hasMany('App\Model\Movies');

    }
    public function directors(){

        return $this->hasMany('App\Model\Directors');

    }

}