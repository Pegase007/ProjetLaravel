<?php

namespace App\Http\Controllers;
use App\Model\Categories;
use App\Model\Comments;
use Illuminate\Http\Request;
use App\Model\Movies;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class CommentsController extends Controller
{
    /**
     * Movies index
     */
    public function index()
    {
        $datas = [

            "comments"=>Comments::all(),
            "average"=>DB::table('comments')->avg('note'),

            "maxcom"=>DB::table('comments')
                        ->select('user.username',DB::raw("COUNT(comments.user_id) as nb") )
                        ->join('user','user.id', '=', 'comments.user_id')
                        ->groupBy('comments.user_id')
                        ->orderBy(DB::raw("COUNT(comments.user_id)"))
                        ->first()

        ];


        return view('Comments/index', $datas);

    }

    /**
     * Comments delete
     */

    public function delete($id){

        $comments=Comments::find($id);
        $comments->delete();

        //j'ecris un message flash en session
        Session::flash('success',"Le commentaire a bien été supprimé");

        //je redirige
        return Redirect::route('comments.index');
    }





}






?>