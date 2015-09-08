<?php
namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Directors extends Model
{

    /**
     * Ma table actors represente la classe actor
     * @var string
     */
    protected $table='directors';

    /**
     * @var bool
     */

    public function movies(){

        return $this->hasMany('App\Model\Movies');

    }


}