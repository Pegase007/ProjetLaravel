<?php

namespace App\Http\Controllers;
use App\Model\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller{
    /**
     * Page Contact
     */
    public function contact(){

        return view ('Pages/Contact');

    }

    /**
     * Page Mention Legales
     */
    public function mention(){

        return view ('Pages/MentionLegales');
    }

    /**
     * Page FAQ
     */
    public function faq(){

        return view ('Pages/Faq');

    }

    public function home(){

//        $db=DB::table('sessions')
//            ->select(DB::raw('COUNT(id)'))
//            ->where('date_session', '>',DB::raw(' DATE(NOW())'))
//            ->first();
//                 dump($db);
//                  exit();
        $datas=[

            'age'=> DB::table('actors')
                ->select(DB::raw('AVG( YEAR( CURRENT_TIMESTAMP ) - YEAR( dob ) - ( RIGHT( CURRENT_TIMESTAMP , 5 ) < RIGHT( dob, 5 ) ) )as age'))
                ->first(),
            'lyon'=>DB::table('actors')
                ->select(DB::raw('COUNT(id) as lyon'))
                ->where('city','Lyon')
                ->first(),
            'paris'=>DB::table('actors')
                ->select(DB::raw('COUNT(id) as paris'))
                ->where('city','Paris')
                ->first(),

            'marseille'=>DB::table('actors')
            ->select(DB::raw('COUNT(id) as marseille'))
            ->where('city','Marseille')
            ->first(),

            'comments'=>DB::table('comments')
            ->select(DB::raw('COUNT(id) as coms'))
            ->first(),

            'actifs'=>DB::table('comments')
                ->select(DB::raw('COUNT(id) as actifs'))
                ->where('state','2')
                ->first(),

            'val'=>DB::table('comments')
            ->select(DB::raw('COUNT(id) as val'))
            ->where('state','1')
            ->first(),

            'inactifs'=>DB::table('comments')
                ->select(DB::raw('COUNT(id) as inact'))
                ->where('state','0')
                ->first(),

            'ttfilms'=>DB::table('movies')
                    ->select(DB::raw('COUNT(id) as movies'))
                    ->first(),
            'fav'=>DB::table('user_favoris')
                   ->select(DB::raw('COUNT(movies_id) as fav'))
                   ->groupBy('movies_id')
                   ->first(),
            'dif'=>DB::table(DB::raw("(SELECT id
                                        FROM `sessions`
                                        WHERE date_session <= DATE(NOW())
                                        GROUP BY movies_id
                                        )AS session"))
                        ->select(DB::raw('COUNT(id) as dif'))
                        ->first(),

            'categories'=>DB::table('categories')
                            ->select('title','id')
                            ->get(),

            'tocome'=>DB::table('sessions')
                        ->select(DB::raw('COUNT(id) as coming') )
                        ->where('date_session', '>',DB::raw(' DATE(NOW())'))
                        ->first(),

            'comingsoon'=>DB::table('sessions')
                        ->select('sessions.date_session as date','movies.id as id', 'movies.title as movies', 'cinema.title as cinema',DB::raw('DATEDIFF(`date_session` , DATE( NOW( ))) as dif'))
                        ->join('movies','movies.id','=','sessions.movies_id')
                        ->join('cinema','cinema.id','=','sessions.cinema_id')
                        ->where('date_session', '>',DB::raw(' DATE(NOW())'))
                        ->get()



        ];



        return view('welcome',$datas);
    }



    public function flashmovie(Request $request){

            $movies=new Movies();
            $movies->title=$request->title;
            $movies->categories_id=$request->categories_id;
            $movies->visible=0;
            $movies->cover=0;

            $movies->save();

            //j'ecris une session message flash
            Session::flash('success',"Le film {$movies->title} a bien été crée");

            //je redirige
            return Redirect::route('home');
    }


    public function search(Request $request){

//Recuperer le champ request securisé
        $title=$request->input('title');
        $lang=$request->input('lang');


        return view('Pages/search');
    }







}




?>