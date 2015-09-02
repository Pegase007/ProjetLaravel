<?php

namespace App\Http\Controllers;
use App\Model\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class UsersController extends Controller{
    /**
     * Movies index
     */
    public function index(){

        $datas=
            [
                'user'=> User::all()
            ];

        return view ('Users/index',$datas);

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

        $users=User::find($id);
        $users->delete();

        //j'ecris un message flash en session
        Session::flash('success',"L'acteur {$users->firstname} {$users->lastname} a bien été supprimé");

        //je redirige
        return Redirect::route('users.index');
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