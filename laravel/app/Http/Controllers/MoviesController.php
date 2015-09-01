<?php

namespace App\Http\Controllers;
use App\Model\Movies;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class MoviesController extends Controller{
    /**
     * Movies index
     */
    public function index(){
        $datas = [

            "movies"=> Movies::all()
        ];

        return view ('Movies/index',$datas);

    }
    /**
     * Movies read
     */
    public function read($id){

        return view ('Movies/read',['id' => $id ]);

    }
    /**
     * Movies update
     */
    public function update($id){

        return view ('Movies/update',['id' => $id ]);

    }
    /**
     * Movies create
     */
    public function create(){

        return view ('Movies/create');

    }

    /**
     * Movies delete
     */

    public function delete($id){

        return redirect('/Movies/index',['id' => $id ]);
    }


    /**
     * Movies delete
     */

    public function search($languages="fr",$visible='1',$duree='2'){

//        dump($languages,$visible,$duree);

        return view('/Movies/search',['languages' => $languages,'visible'=>$visible,'duree'=>$duree ]);
    }


}




?>