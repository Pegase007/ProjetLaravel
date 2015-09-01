<?php

namespace App\Http\Controllers;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller{

//    /**
//     * Movies index
//     */
//    public function getIndex(){
//
//        return view ('Category/index');
//
//    }
//    /**
//     * Movies read
//     */
//    public function getRead($id){
//
//        return view ('Category/read',['id' => $id ]);
//
//    }
//    /**
//     * Movies update
//     */
//    public function getUpdate($id){
//
//        return view ('Category/update',['id' => $id ]);
//
//    }
//    /**
//     * Movies create
//     */
//    public function getCreate(){
//
//        return view ('Category/create');
//
//    }
//
//    /**
//     * Movies delete
//     */
//
//    public function getDelete($id){
//
//        return redirect('/Category/index',['id' => $id ]);
//    }
//
//
//    /**
//     * Movies delete
//     */
//
//    public function getSearch(){
//
//
//        return view('Category/search');
//    }



    /**
     * Movies index
     */
    public function index(){

        return view ('Category/index');

    }
    /**
     * Movies read
     */
    public function read($id){

        return view ('Category/read',['id' => $id ]);

    }
    /**
     * Movies update
     */
    public function update($id){

        return view ('Category/update',['id' => $id ]);

    }
    /**
     * Movies create
     */
    public function create(){

        return view ('Category/create');

    }

    /**
     * Movies delete
     */

    public function delete($id){

        return redirect('/Category/index',['id' => $id ]);
    }


    /**
     * Movies delete
     */

    public function search(){


        return view('Category/search');
    }


}




?>