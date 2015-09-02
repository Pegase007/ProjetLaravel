<?php

namespace App\Http\Controllers;
use App\Model\Movies;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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
    public function read($id=null){

        $datas=[

            'movies'=>Movies::find($id)

        ];

        return view ('Movies/read',$datas);

    }
    /**
     * Movies update
     */
    public function update($id)
    {

        $movies = Movies::find($id);

        if ($movies->visible == 0) {

            $movies->update('update $movies set visible = 1');
        } else {

            $movies->update('update $movies set visible = 0');
        }

        //je redirige
        return Redirect::route('movies.index');

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

        //je supprime un acteur
        $movies=Movies::find($id);
        $movies->delete();


        //j'ecris un message flash en session
        Session::flash('success',"L'acteur {$movies->firstname} {$movies->lastname} a bien été supprimé");

        //je redirige
        return Redirect::route('movies.index');
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