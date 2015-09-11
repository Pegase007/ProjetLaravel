<?php
namespace App\Model;


class Comments extends \Illuminate\Database\Eloquent\Model
{

    /**
     * Ma table comments represente la classe comments
     * @var string
     */
    protected $table='comments';


    /**
     * @var bool
     */

    public $timestamps=false;


    protected $fillable =['content', 'movies_id', 'date_created', 'user_id'];

    public function movies(){


        return $this->belongsTo('App\Model\Movies');



    }

    public function user(){


        return $this->belongsTo('App\Model\User');



    }





}