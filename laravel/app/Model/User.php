<?php
namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    /**
     * Ma table actors represente la classe actor
     * @var string
     */
    protected $table='user';


    public function comments(){

        return $this->hasMany('App\Model\Comments');

    }
}