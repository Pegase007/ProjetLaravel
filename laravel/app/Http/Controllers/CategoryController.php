<?php

namespace App\Http\Controllers;
use App\Model\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller{

//    /**
//     * Categories index
//     */
//    public function getIndex(){
//
//        return view ('Category/index');
//
//    }
//    /**
//     * Categories read
//     */
//    public function getRead($id){
//
//        return view ('Category/read',['id' => $id ]);
//
//    }
//    /**
//     * Categories update
//     */
//    public function getUpdate($id){
//
//        return view ('Category/update',['id' => $id ]);
//
//    }
//    /**
//     * Categories create
//     */
//    public function getCreate(){
//
//        return view ('Category/create');
//
//    }
//
//    /**
//     * Categories delete
//     */
//
//    public function getDelete($id){
//
//        return redirect('/Category/index',['id' => $id ]);
//    }
//
//
//    /**
//     * Categories delete
//     */
//
//    public function getSearch(){
//
//
//        return view('Category/search');
//    }



    /**
     * Categories index
     */
    public function index(){


        $category = Categories::all()->random(1);
//        dump(count($category->movies));
//
//        $nb = DB::table('comments')
//            ->select(DB::raw('COUNT(*)'))
//            ->join('movies','movies.id', '=', 'comments.movies_id')
//            ->where('movies.categories_id','=', $category->id)
//            ->groupBy('movies.categories_id')
//            ->get();
//
//        dump($nb);
//        exit();


        $datas =[

            'categories'=> Categories::all(),
            'random'=>$category,

            "movies" => Categories::find(1)->movies,
            "nomovies"=>DB::table('categories')
                ->select(DB::raw('COUNT(categories.id) as nb'))
                ->leftJoin('movies', 'categories.id', '=', 'movies.categories_id')
                ->whereNull('movies.categories_id')
                ->first(),

            "popular"=> DB::table('categories')
                ->select ('categories.title')
                ->join('movies','categories.id', '=', 'movies.categories_id')
                ->groupBy('movies.categories_id')
                ->orderBy(DB::raw("COUNT(movies.id)"))
                ->first(),

            "budget"=>DB::table('categories')
                ->select ('categories.title')
                ->join('movies','categories.id', '=', 'movies.categories_id')
                ->where(DB::raw(" YEAR( movies.date_release )"),'=',"2015")
                ->groupBy('categories.id')
                ->first(),


//            "countcomments"=>DB::table('comments')
//                ->select(DB::raw('COUNT(*)'))
//                ->join('movies','categories.id', '=', 'movies.categories_id')
//                ->where('$category->movies->id','=','comments.movies_id' )

        ];
        return view ('Category/index',$datas);



    }



    /**
     * Categories read
     */
    public function read($id=null){

        $data=[

            'category'=> Categories::find($id)
        ];
        return view ('Category/read',$data);

    }
    /**
     * Categories update
     */
    public function update($id){

        return view ('Category/update',['id' => $id ]);

    }
    /**
     * Categories create
     */
    public function create(){

        return view ('Category/create');

    }

    /**
     * Categories delete
     */

    public function delete($id){

        $category=Categories::find($id);
        $category->delete();

        //j'ecris un message flash en session
        Session::flash('success',"L'acteur {$category->firstname} {$category->lastname} a bien été supprimé");

        //je redirige
        return Redirect::route('category.index');
    }


    /**
     * Categories delete
     */

    public function search(){


        return view('Category/search');
    }


}




?>