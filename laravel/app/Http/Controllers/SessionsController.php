<?php

namespace App\Http\Controllers;
use App\Model\Cinema;
use App\Model\Movies;
use App\Model\Tasks;
use App\Model\Temoignages;
use App\Model\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class SessionsController extends Controller{
    /**
     * Movies index
     */
    public function index(){



        return view ('sessions.index');

    }


    public function ajax(){

        $comingsoon = DB::table('sessions')
            ->select('sessions.date_session as date','movies.id as id', 'movies.title as movies', 'cinema.title as cinema',DB::raw('DATEDIFF(`date_session` , DATE( NOW( ))) as dif'))
            ->join('movies','movies.id','=','sessions.movies_id')
            ->join('cinema','cinema.id','=','sessions.cinema_id')
            ->where('date_session', '>',DB::raw(' DATE(NOW())'))
            ->get();

        $tocome = DB::table('sessions')
            ->select(DB::raw('COUNT(id) as coming') )
            ->where('date_session', '>',DB::raw(' DATE(NOW())'))
            ->first();

        return view('Sessions/ajax',
            ['comingsoon' => $comingsoon, 'tocome' => $tocome]
        );
    }




    public function tasks(){

        $data=[

            'cinemas' => Cinema::all(),
            'movies'=>Movies::all(),
            'temoignages'=>Temoignages::all(),
            'tasks'=>Tasks::orderBy('position')->get(),



        ];

        return view('Sessions/tasks',$data);
    }


    public function review(){

        $data=[

            'cinemas' => Cinema::all(),
            'movies'=>Movies::all(),
            'temoignages'=>Temoignages::orderBy('date','desc')->limit('4')->get(),



        ];

        return view('Sessions/review',$data);
    }


    public function users(){

        $data=[


            'users'=>User::orderBy('created_at','desc')->limit('5')->get()



        ];

        return view('Sessions/users',$data);
    }

    public function boxmovie(){



        return view('Sessions/boxmovie');
    }







}




?>