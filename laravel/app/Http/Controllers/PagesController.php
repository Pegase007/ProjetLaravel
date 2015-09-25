<?php

namespace App\Http\Controllers;
use App\Model\Actors;
use App\Model\ActorsMovies;
use App\Model\Categories;
use App\Model\Cinema;
use App\Model\Comments;
use App\Model\Directors_Movies;
use App\Model\Messages;
use App\Model\Movies;
use App\Model\Notifications;
use App\Model\Sessions;
use App\Model\Tasks;
use App\Model\Temoignages;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
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

    public function home()
    {




        if (Gate::denies('authexpire')){
            Auth::logout();
            return Redirect::to('auth/login');
        }
//        $db=DB::table('sessions')
//            ->select(DB::raw('COUNT(id)'))
//            ->where('date_session', '>',DB::raw(' DATE(NOW())'))
//            ->first();
//                 dump($db);
//                  exit();


////        CONNECTION A LA BD DE MONGO DB
//        $m=new\MongoClient();
//        $db=$m->selectDB('laravel');
//        $collection=new \MongoCollection($db,'messages');
//
//        $find=array();
//        $messages=$collection->find($find);



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
                        ->get(),

            'messages'=> Messages::where('user', 'exists', true)->get(),

            'notifications' => Notifications::all(),





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

    public function advanced(){

        $data=[

            'cinemas' => Cinema::all(),
            'movies'=>Movies::all(),
            'temoignages'=>Temoignages::orderBy('date','desc')->limit('4')->get(),
            'tasks'=>Tasks::orderBy('position')->get(),
            'users'=>User::orderBy('created_at','desc')->limit('5')->get(),

            'marseille'=>Actors::where('city','=','Marseille')->get(),
            'lyon'=>Actors::where('city','=','Lyon')->get(),
            'newyork'=>Actors::where('city','=','NewYork')->get(),
            'hampshire'=>Actors::where('city','=','Hampshire')->get(),


            'one'=>Actors::where(DB::raw('TIMESTAMPDIFF( YEAR,  `dob` , NOW( ) )'),'>','18')->where(DB::raw('TIMESTAMPDIFF( YEAR,  `dob` , NOW( ) )'),'<','25')->get(),
            'two'=>Actors::where(DB::raw('TIMESTAMPDIFF( YEAR,  `dob` , NOW( ) )'),'>','25')->where(DB::raw('TIMESTAMPDIFF( YEAR,  `dob` , NOW( ) )'),'<','35')->get(),
            'three'=>Actors::where(DB::raw('TIMESTAMPDIFF( YEAR,  `dob` , NOW( ) )'),'>','35')->where(DB::raw('TIMESTAMPDIFF( YEAR,  `dob` , NOW( ) )'),'<','45')->get(),
            'four'=>Actors::where(DB::raw('TIMESTAMPDIFF( YEAR,  `dob` , NOW( ) )'),'>','45')->where(DB::raw('TIMESTAMPDIFF( YEAR,  `dob` , NOW( ) )'),'<','60')->get(),
            'five'=>Actors::where(DB::raw('TIMESTAMPDIFF( YEAR,  `dob` , NOW( ) )'),'<','60')->get(),



            'bestdirector'=>Directors_Movies::select('directors.id','directors.firstname','directors.lastname')
                ->join('directors','directors.id', '=', 'directors_movies.directors_id')
                ->groupBy('directors_movies.directors_id')
                ->orderBy(DB::raw('COUNT(directors_movies.movies_id)'), 'desc')
                ->limit('4')
                ->get(),




        ];

        return view('Pages/advanced',$data);

    }


    public function pro(){


        return view('Pages/professional');

    }

    public function task(){



    }
    public function nwtask(Request $request){

//        dump(\DateTime::format ($request->date ));
//        exit();



        $task = new Tasks();
        $task->content=$request->content;
        $task->date=$request->date=date_create_from_format("d/m/Y H:i:s",$request->date);
        $task->movie=$request->movie;
        $task->administrators_id=$request->administrator_id;
        $task->save();

        return Redirect::route('advanced');



    }

    public function position(Request $request){




        $exploded=explode("&",($request->data));
        $tab=[];
        foreach ($exploded as $explode){

            $data=explode("=",($explode));
            array_push($tab,$data[1]);


        }
//        dump(count($tab));
//        exit();


        for($i=0; $i < count($tab); $i++){

            $position=Tasks::find($tab[$i]);
            $position->position = $i;
            $position->save();

        }


        return Redirect::route('advanced');


    }

    public function clear(Request  $request){

        $tasks = $request->input('task');

        foreach($tasks as $task) {

//            dump($task);
            $tache = Tasks::find($task);
            $tache->delete();

        }



    }

    public function state($id){

        $task=Tasks::find($id);

        if($task->state ==0){

            $task->state = 1;

            $task->save();

        }
        else{

            $task->state = 0;

            $task->save();

        }

    }


    public function newmessages(Request $request){

        $message = new Messages();
        $message-> user = Auth::user()->toArray();
        $message->content=$request->input('content');
        $message->save();

        return response()->json([true]);


    }






}




?>