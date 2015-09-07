<?php

namespace App\Http\Controllers;
use App\Http\Requests\ActorsRequest;
use App\Model\Actors;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

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

           "actors"=> Actors::all()
        ];

        return view ('Actors/index',$datas);

    }
    /**
     * Actors read
     */
    public function read($id=null){

//         echo $id;
        $datas =[
            'actors' => Actors::find($id)
        ];

        return view ('Actors/read',$datas);

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

        $actor =Actors::find($id);
        $actor->delete();

        //j'ecris un message flash en session
        Session::flash('success',"L'acteur {$actor->firstname} {$actor->lastname} a bien été supprimé");

        //je redirige
        return Redirect::route('actors.index');
    }


    /*
     * ActorsRequest est une classe de validation de formulaire
     * Cette classe est liée à la requete, c'est une classe FormRequest
     *
     * Le mecanisme de validation de formulaire dans Laravel
     * valide le formulaire et fais une redirection vers create quand mon formulaire contiens des erreurs, sinon
     * rentre dans l'action store()
     */
    public function store(ActorsRequest $request){

        // J'enregistre un nouvel acteur dès que mon formulaire est valide (0 erreurs)

        $actor=new Actors();
        $actor->firstname=$request->firstname;
        $actor->lastname=$request->lastname;
        $actor->dob=$request->dob;
        $actor->biography=$request->biography;
        $actor->roles=$request->roles;
        $actor->image=$request->image;
        $actor->nationality=$request->nationality;
        $actor->recompenses=$request->recompenses;

        $actor->save();

        //j'ecris une session message flash
        Session:: flash('success',"L'acteur {actor->firstname} {actor->lastname} a bien été crée");

        //je redirige
        return Redirect::route('actors.index');



    }




}




?>