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
     * Movies update updates di visibility
     */
    public function update($id,$action)
    {

        if ($action =='visible'){

            $movies=Movies::find($id);
    //        ->where('visible', 0)
    //        ->update(['visible' => 1]);

            if ($movies->visible == 0) {

                $movies->visible = 1;

                $movies->save();

                Session::flash('success',"Le film  {$movies->title} a bien été activé");


            }else {

                $movies->visible = 0;

                $movies->save();

                Session::flash('danger',"Le film  {$movies->title} a bien desactivé");

            }

            //je redirige
            return Redirect::route('movies.index');

        }else{

            $movies=Movies::find($id);
//        ->where('visible', 0)
//        ->update(['visible' => 1]);

            if ($movies->cover == 0) {

                $movies->cover = 1;

                $movies->save();

                Session::flash('success',"Le film  {$movies->title} est en cover");

            }else {

                $movies->cover = 0;

                $movies->save();

                Session::flash('danger',"Le film  {$movies->title} a été retiré de la cover");

            }


            //je redirige
            return Redirect::route('movies.index');



        }




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

        return view('Movies/search',['languages' => $languages,'visible'=>$visible,'duree'=>$duree ]);
    }



    /**
     * Movies delete
     */

    public function form(){

//        dump($languages,$visible,$duree);

        return view('Movies/form');
    }


    public function condition($condition)
    {



        if($condition=='visible'){
            $datas=[

                'movies'=> Movies::where('visible',1)
                    ->get()


            ];

        }
        if($condition=='invisible'){

            $datas=[

                'movies'=> Movies::where('visible',0)
                    ->get()

            ];
        }
        if($condition=='VO'){

            $datas=[

                'movies'=> Movies::where('bo','VO')
                    ->get(),
                'class'=>'"btn btn-sucess"'

            ];
        }
        if($condition=='VOST'){

            $datas=[

                'movies'=> Movies::where('bo','VOST')
                    ->get()

            ];
        }
        if($condition=='VF'){

            $datas=[

                'movies'=> Movies::where('bo','VF')
                    ->get()

            ];
        }
        if($condition=='VOSTFR'){

            $datas=[

                'movies'=> Movies::where('bo','VOSTFR')
                    ->get()

            ];
        }
        if($condition=='WarnerBros'){

            $datas=[

                'movies'=> Movies::where('distributeur','Warner_Bros')
                    ->get()

            ];
        } if($condition=='HBO'){

        $datas=[

            'movies'=> Movies::where('distributeur','HBO')
                ->get()

        ];
    }


        //j'ecris un message flash en session
        Session::flash('select','');

        return view ('Movies/index',$datas);


    }




    public function actions($input){


        if (Input::get('attending_lan') === 'yes') {
            // checked
        } else {
            // unchecked
        }


    }

}



?>