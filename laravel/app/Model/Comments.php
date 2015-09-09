<?php
namespace App\Model;


class Comments extends \Illuminate\Database\Eloquent\Model
{

    /**
     * Ma table comments represente la classe comments
     * @var string
     */
    protected $table='comments';



    public function movies(){


        return $this->belongsTo('App\Model\Movies');



    }

    public function user(){


        return $this->belongsTo('App\Model\User');



    }

}