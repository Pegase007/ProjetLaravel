<?php

namespace App\Http\Controllers;
use App\Model\Categories;
use App\Model\Comments;
use Illuminate\Http\Request;
use App\Model\Movies;
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


            "movies" => Comments::find(1)->movies


        ];

        return view('Movies/index', $datas);

    }
}

?>