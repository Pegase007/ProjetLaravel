<?php

namespace App\Http\Controllers;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class ActorsController extends Controller{
    /**
     * Actors index
     */
    public function index(){


        $datas = [
            'title'=> "Liste des acteurs",
            'noms' =>["Julien","Matthieu","Aurelien","Thaïs","Marjorie","Daniel"],
            "age"=>[27, 30, 22, 27, 33, 65],
            "localite"=>[
            "Paris"=>["Jessy","Marjorie","Daniel"],
            "Lyon"=>["Thais","Julien","Matthieu"]
            ],
            'acteurs'=>[
                ["nom"=>"Boyer","prenom"=>"Julien", "age"=>"27"],
                ["nom"=>"De Brito","prenom"=>"Thais","age"=>"27"],
                ["nom"=>"Rouquet","prenom"=>"Marjorie","age"=>"30"],
                ["nom"=>"Lehne","prenom"=>"Matthieu","age"=>"30"]
            ]
        ];

        return view ('Actors/index',$datas);

    }
    /**
     * Actors read
     */
    public function read($id){

//         echo $id;

        return view ('Actors/read',['id' => $id ]);

    }
    /**
     * Actors update
     */
    public function update($id){



        return view ('Actors/update',['id' => $id ]);

    }
    /**
     * Actors create
     */
    public function create(){


        return view ('Actors/create');

    }

    /**
     * Actors delete
     */

    public function delete($id){

        return redirect('/Actors/index',['id' => $id ]);
    }






}




?>