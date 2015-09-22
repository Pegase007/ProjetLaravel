<?php

namespace App\Http\Controllers;

use App\Model\ActorsMovies;
use App\Model\Categories;
use App\Model\Directors;
use Illuminate\Support\Facades\DB;


/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{

    public function getBestDirectors(){

        $directors = Directors::all();

//    dump($directors->toJson());


        return response()->json($directors);



    }


    public function getMoviesCat(){

        $movies =
            Categories::select(DB::raw('COUNT(movies.id) as mov'),'categories.title as title')
                ->join('movies','categories.id','=','movies.categories_id')
                ->groupBy('categories.id')->get();

        $table=[];


        foreach($movies as $mov){

            array_push($table,array($mov->title,(int)$mov->mov));

        };
//        $tab = [
//            ['lala', 5],
//            ['lili', 5],
//        ];

        return response()->json($table);


    }


    public function getActMovies(){


        $actors = ActorsMovies::select('actors_id', DB::raw('COUNT( movies_id ) as count ,CONCAT( actors.firstname,  " ", actors.lastname ) as name'))
            ->join('actors', 'actors.id', '=', 'actors_movies.actors_id')
            ->groupBy('actors_id')
            ->orderBy(DB::raw('COUNT(movies_id)'), 'desc')
            ->take(5)
            ->get();

        $cat = Categories::select('title','id')->get()->random(5);

//        dump($actors);

        $name=[];



        foreach ($actors as $actor) {
            $data=[];
            $title=[];
//                array_push($name,array("name"=> $actor->name));

            foreach ($cat as $category){

                $count = ActorsMovies::select(DB::raw('COUNT(movies_id) as count'))
                    ->join('movies', 'movies.id', '=', 'actors_movies.movies_id')
                    ->join('categories', 'categories.id', '=', 'movies.categories_id')
                    ->where('actors_id', '=', $actor->actors_id)
                    ->where('categories.id', '=',$category->id)
                    ->first();


                $data[] = (int)$count->count;
                $title[]=$category->title;

            }

            array_push($name,array("name"=> $actor->name,"data"=> $data));

        }

        //dump($name);
        return array(
            'result' => $name,
            'cat' => $title
        );


    }




}


?>