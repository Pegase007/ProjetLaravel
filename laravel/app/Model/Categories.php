<?php
namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    /**
     * Ma table actors represente la classe actor
     * @var string
     */
    protected $table='categories';


    public function movies(){

        return $this->hasMany('App\Model\Movies');

    }



    public $timestamps=false;

}