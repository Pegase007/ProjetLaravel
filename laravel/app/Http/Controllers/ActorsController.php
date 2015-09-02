<?php

namespace App\Http\Controllers;
use App\Model\Actors;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
    public function read($id=null){

//         echo $id;
        $datas =[
            'actors' => Actors::find($id)
        ];

        return view ('Actors/read',$datas);

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

        $actor =Actors::find($id);
        $actor->delete();

        //j'ecris un message flash en session
        Session::flash('success',"L'acteur {$actor->firstname} {$actor->lastname} a bien été supprimé");

        //je redirige
        return Redirect::route('actors.index');
    }






}




?>