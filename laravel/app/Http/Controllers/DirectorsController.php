<?php

namespace App\Http\Controllers;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class DirectorsController extends Controller{
    /**
     * Actors index
     */
    public function index(){

        return view ('Directors/index');

    }
    /**
     * Actors read
     */
    public function read($id){

        return view ('Directors/read',['id' => $id ]);

    }
    /**
     * Actors update
     */
    public function update($id){

        return view ('Directors/update',['id' => $id ]);

    }
    /**
     * Actors create
     */
    public function create(){

        return view ('Directors/create');

    }

    /**
     * Actors delete
     */

    public function delete($id){

        return redirect('/Directors/index',['id' => $id ]);
    }






}




?>