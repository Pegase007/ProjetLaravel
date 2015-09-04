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


    public function Movies(){


        return $this->hasMany('App\Model\Movies');



    }

}