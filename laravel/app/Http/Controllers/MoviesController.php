<?php

namespace App\Http\Controllers;
use App\Http\Requests\MoviesRequest;
use App\Model\Actors;
use App\Model\ActorsMovies;
use App\Model\Categories;
use App\Model\Directors;
use Illuminate\Http\Request;
use App\Model\Movies;
use Illuminate\Support\Facades\DB;
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

            "movies"=> Movies::all(),
            "counter"=>count(Movies::all()),
            "top"=>count(Movies::where('cover',1)->get()),
            "futureRelease"=>count(Movies::where('date_release','>',new \DateTime('today'))->get()),
            "actif"=>count(Movies::where('visible',1)->get()),
            "budget"=> Movies::where('date_release','>',2015-01-01)->where('date_release','>',2015-12-31)
                    ->sum('budget')


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

        }elseif($action =='cover'){

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



        }elseif($action =='up') {

            $movies=Movies::find($id);

            $movies->note_presse = $movies->note_presse +1;

            $movies->save();

            Session::flash('success', "La note du film  {$movies->title} a été aumentée");

            return Redirect::route('movies.index');
        }elseif($action =='down') {

            $movies=Movies::find($id);

            $movies->note_presse = $movies->note_presse -1;

            $movies->save();

            Session::flash('danger', "La note du film  {$movies->title} a été reduit");

            return Redirect::route('movies.index');
        }





    }

    /**
     * Movies create
     */
    public function create(){

    $datas = [
        "categories" => Categories::all(),
        "actors"=>Actors::all(),
        "directors"=>Directors::all(),
    ];

    return view ('Movies/create',$datas);

}

    public function store(MoviesRequest $request){

        // J'enregistre un nouvel acteur dès que mon formulaire est valide (0 erreurs)
    $year=substr($request->date_release, -4);
        $movies=new Movies();
        $movies->type_film=$request->type_film;
        $movies->title=$request->title;
        $movies->date_release = $request->date_release =date_create_from_format("d/m/Y",$request->date_release);
        $movies->annee = $year;
        $movies->trailer=$request->trailer;
        $movies->budget=$request->budget;
        $movies->duree=$request->duree;

        $movies->categories_id=$request->categories_id;
        $movies->languages=$request->languages;
        $movies->bo=$request->bo;
        $movies->distributeur=$request->distributeur;
        $movies->note_presse=$request->note_presse;
        $movies->visible=$request->visibility;
        $movies->cover=$request->cover;
        $movies->synopsis=$request->synopsis;
        $movies->description=$request->description;
        $movies->image=$request->image;

//        $actors->filmography=$request->

        //$request->name dans le formulaire

        $filename = ""; //define null
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename=$file->getClientOriginalName();

            //Move upload
            $destinationPath = public_path().'/uploads/movies/'; //path vers public
            $file->move($destinationPath,$filename); //move the image file into public/upload

        }
        $movies->image = asset("/uploads/movies/".$filename);
        $movies->save();


//        Get the directors in the form and insert them into the directors_movies table
        foreach($request->directors_id as $director){


            DB::table('directors_movies')->insert(array(
                array('directors_id' => $director, 'movies_id' => $movies->id),
            ));

        }
        //        Get the actors in the form and insert them into the actors_movies table


        foreach($request->actors_id as $actor){


            DB::table('actors_movies')->insert(array(
                array('actors_id' => $actor, 'movies_id' => $movies->id),
            ));

        }









        //j'ecris une session message flash
        Session:: flash('success',"Le film {$movies->title} a bien été crée");

        //je redirige
        return Redirect::route('movies.index');



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

        Session::flash('tab', "Test 1");
        Session::flash('tab', "Test 2");
        Session::flash('tab', "Test 3");

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




    public function actions(Request $request)
    {


        $movflash=[];
        $movies = $request->input('movies');

        $actions = $request->input('actions');

        if ($actions == "Supprimer") {

            foreach ($movies as $movie) {

                $mov = Movies::find($movie);
                $mov->delete();

                array_push( $movflash,$mov->title);

                array_push( $movflash,("Le film ".$mov->title." a bien été supprimé"));

            }
        }
            if ($actions == "Activer") {


                foreach ($movies as $movie) {

                    $mov = Movies::find($movie);

                    if ($mov->visible == 0) {

                        $mov->visible = 1;

                        $mov->save();

                        array_push( $movflash,("Le film ".$mov->title." a bien été activé"));

                    }
                }
            }
        if ($actions == "Desactiver") {


            foreach ($movies as $movie) {

                $mov = Movies::find($movie);

                if ($mov->visible == 1) {

                    $mov->visible = 0;

                    $mov->save();

                    array_push( $movflash,("Le film ".$mov->title." a bien été desactivé"));



                }
            }
        }

        Session::flash('tab',  $movflash  );

//            Session::flash('success', "Le film ".$movie." , a bien été activé");

            //je redirige
            return Redirect::route('movies.index');


        }


    }


?>