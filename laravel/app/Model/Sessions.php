<?php
namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{

    /**
     * Ma table actors represente la classe actor
     * @var string
     */
    protected $table='sessions';

    /**
     * @var bool
     */

    public $timestamps=false;


    public function movies()
    {
        return $this->belongsTo('App\Model\Movies');
    }

    public function cinema()
    {
        return $this->belongsTo('App\Model\Cinema');
    }



}