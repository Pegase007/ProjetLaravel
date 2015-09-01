<?php

namespace App\Http\Controllers;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class CinemaController extends Controller{

//    /**
//     * Movies index
//     */
//    public function getIndex(){
//
//        return view ('Cinema/index');
//
//    }
//    /**
//     * Movies read
//     */
//    public function getRead($id){
//
//        return view ('Cinema/read',['id' => $id ]);
//
//    }
//    /**
//     * Movies update
//     */
//    public function getUpdate($id){
//
//        return view ('Cinema/update',['id' => $id ]);
//
//    }
//    /**
//     * Movies create
//     */
//    public function getCreate(){
//
//        return view ('Cinema/create');
//
//    }
//
//    /**
//     * Movies delete
//     */
//
//    public function getDelete($id){
//
//        return redirect('/Cinema/index',['id' => $id ]);
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
//        return view('Cinema/search');
//    }
//


    /**
     * Movies index
     */
    public function index(){

        return view ('Cinema/index');

    }
    /**
     * Movies read
     */
    public function read($id){

        return view ('Cinema/read',['id' => $id ]);

    }
    /**
     * Movies update
     */
    public function update($id){

        return view ('Cinema/update',['id' => $id ]);

    }
    /**
     * Movies create
     */
    public function create(){

        return view ('Cinema/create');

    }

    /**
     * Movies delete
     */

    public function delete($id){

        return redirect('/Cinema/index',['id' => $id ]);
    }


    /**
     * Movies delete
     */

    public function search(){


        return view('Cinema/search');
    }


}




?>