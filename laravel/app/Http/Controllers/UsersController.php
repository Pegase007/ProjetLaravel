<?php

namespace App\Http\Controllers;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class UsersController extends Controller{
    /**
     * Movies index
     */
    public function index(){

        return view ('Users/index');

    }
    /**
     * Movies read
     */
    public function read($id){

        return view ('Users/read',['id' => $id ]);

    }
    /**
     * Movies update
     */
    public function update($id){

        return view ('Users/update',['id' => $id ]);

    }
    /**
     * Movies create
     */
    public function create(){

        return view ('Users/create');

    }

    /**
     * Movies delete
     */

    public function delete($id){

        return redirect('/Users/index',['id' => $id ]);
    }


    /**
     * Movies delete
     */

    public function search($zipcode="69002", $ville="*",$enabled=1){


//        dump($zipcode, $ville,$enabled);

        return view('/Users/search',[ 'zipcode'=> $zipcode, 'ville'=> $ville,'enabled'=> $enabled]);
    }


}




?>