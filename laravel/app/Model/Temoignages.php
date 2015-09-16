<?php
namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Temoignages extends Model
{

    /**
     * Ma table actors represente la classe actor
     * @var string
     */
    protected $table='temoignages';

    /**
     * @var bool
     */

    public $timestamps=false;


    public function cinema()
    {
        return $this->belongsTo('App\Model\Cinema');
    }

    public function movies()
    {
        return $this->belongsTo('App\Model\Movies');
    }


}