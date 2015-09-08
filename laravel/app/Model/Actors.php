<?php
namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Actors extends Model
{

    /**
     * Ma table actors represente la classe actor
     * @var string
     */
    protected $table='actors';

    /**
     * @var bool
     */

    public $timestamps=false;


    public function movies()
    {
        return $this->belongsToMany('App\Model\Movies');
    }


}