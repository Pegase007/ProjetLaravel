<?php

namespace App\Http\Controllers;

use App\Model\ActorsMovies;
use App\Model\Categories;
use App\Model\Cinema;
use App\Model\Directors;
use App\Model\Movies;
use App\Model\Sessions;
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

    public function getSeances(){

        $seances = Sessions::select(DB::raw('COUNT(movies_id) as count'))
            ->groupBy(DB::raw('MONTH(date_session)'))
            ->get()
        ;

        $tab=[];
        foreach ($seances as $session){

            array_push($tab,(int)$session->count);

        }

//        dump($seances->toArray());
        return response()->json($tab);


    }


    public function getBudgetCat(){


        $bestcat=Categories::select('categories.title as title','categories.id as id','movies.id as mov',DB::raw('COUNT(movies.id) as count'))
            ->join('movies','movies.categories_id','=','categories.id')
            ->groupBy('categories.title')
            ->orderBy(DB::raw('COUNT(movies.id)'),'desc')
            ->take(4)
            ->get();





        $name=[];
        foreach ($bestcat as $cat){


//            $name[]=$cat->title;

            $movie=Movies::select(DB::raw('SUM(budget) as sum ,MONTH(date_release) as month'))
                ->join('categories','movies.categories_id','=','categories.id')
                ->where('categories.id','=',$cat->id)
                ->groupBy('month')
                ->get();


            $tab=[];
            $data=[];


//            dump();
//            exit();

            for($i=1;$i<13;$i++) {

                $movie = Movies::select(DB::raw('SUM(budget) as sum ,MONTH(date_release) as month'))
                    ->join('categories', 'movies.categories_id', '=', 'categories.id')
                    ->where('categories.id', '=', $cat->id)
                    ->where(DB::raw('MONTH(date_release)'), '=', $i)
                    ->groupBy('month')
                    ->first();

                if ( is_null($movie) ){

                    $data[] = 0;
                }else{

                    $data[] =(int)$movie->sum;

                }

            }


            array_push($name,array("name"=> $cat->title,"data"=> $data));


        }

        return response()->json($name);

    }

//    public function getComments(){
//
//
//        $movcoms=Movies::select('movies.title',DB::raw('COUNT(comments.id)'))
//            ->join('comments','comments.movies_id','=','movies.id')
//            ->groupBy('movies.id')
//            ->get();
//
//
//        $ttcinecoms=Cinema::select('cinema.title',DB::raw('COUNT(comments.id)as count'))
//            ->join('cinema_movies','cinema.id', '=', 'cinema_movies.cinemas_id')
//            ->join('movies','movies.id', '=', 'cinema_movies.movies_id')
//            ->join('comments','comments.movies_id', '=', 'movies.id')
////            ->groupBy('cinema.id')
//            ->get();
//$tab=[];
//
//
//        foreach($ttcinecoms as $cine){
//
//            dump($cine->groupBy('cinema.id'));
//            exit();
//
//            $tab[]=array("name"=>$cine->title,"Y"=>(($cine->count->groupBy('cinema.id')*100)/(int)$cine->count));
//
//
//
//        }
//
//
////        foreach($movcoms as $mov){
////
////
////
////
////        }
//        return response()->json($tab);
//
//    }




}


?>