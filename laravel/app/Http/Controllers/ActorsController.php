<?php

namespace App\Http\Controllers;
use App\Model\Actors;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class ActorsController extends Controller{
    /**
     * Actors index
     */
    public function index(){


        $datas = [

           "actors"=> Actors::all()
        ];

        return view ('Actors/index',$datas);

    }
    /**
     * Actors read
     */
    public function read($id){

//         echo $id;

        return view ('Actors/read',['id' => $id ]);

    }
    /**
     * Actors update
     */
    public function update($id){



        return view ('Actors/update',['id' => $id ]);

    }
    /**
     * Actors create
     */
    public function create(){


        return view ('Actors/create');

    }

    /**
     * Actors delete
     */

    public function delete($id){

        return redirect('/Actors/index',['id' => $id ]);
    }






}




?>