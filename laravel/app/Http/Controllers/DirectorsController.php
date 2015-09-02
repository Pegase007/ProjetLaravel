<?php

namespace App\Http\Controllers;
use App\Model\Directors;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class DirectorsController extends Controller{
    /**
     * Actors index
     */
    public function index(){

        $datas = [

            "directors"=> Directors::all()
        ];

        return view ('Directors/index',$datas);

    }
    /**
     * Actors read
     */
    public function read($id=null){

        $data=[


            'directors'=> Directors::find($id)

        ];
        return view ('Directors/read',$data);

    }
    /**
     * Actors update
     */
    public function update($id){

        return view ('Directors/update',['id' => $id ]);

    }
    /**
     * Actors create
     */
    public function create(){

        return view ('Directors/create');

    }

    /**
     * Actors delete
     */

    public function delete($id){

        $directors= Directors::find($id);
        $directors->delete();

        //j'ecris un message flash en session
        Session::flash('success',"L'acteur {$directors->firstname} {$directors->lastname} a bien été supprimé");

        //je redirige

        return Redirect::route('directors.index');
    }






}




?>