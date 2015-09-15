<?php
namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{

    /**
     * Ma table actors represente la classe actor
     * @var string
     */
    protected $table='cinema';

    /**
     * @var bool
     */

    public $timestamps=false;


    public function movies()
    {
        return $this->hasMany('App\Model\Movies');
    }

    public function sessions()
    {
        return $this->hasMany('App\Model\Sessions');
    }

}