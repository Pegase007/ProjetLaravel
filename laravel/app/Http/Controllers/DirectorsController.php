<?php

namespace App\Http\Controllers;
use App\Http\Requests\ActorsRequest;
use App\Http\Requests\DirectorsRequest;
use App\Model\Directors;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class DirectorsController extends Controller{
    /**
     * Actors index
     */
    public function index(){

        $datas = [

            "directors"=> Directors::all()
        ];

        return view ('Directors/index',$datas);

    }
    /**
     * Actors read
     */
    public function read($id=null){

        $data=[


            'directors'=> Directors::find($id)

        ];
        return view ('Directors/read',$data);

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


    /*
     * ActorsRequest est une classe de validation de formulaire
     * Cette classe est liée à la requete, c'est une classe FormRequest
     *
     * Le mecanisme de validation de formulaire dans Laravel
     * valide le formulaire et fais une redirection vers create quand mon formulaire contiens des erreurs, sinon
     * rentre dans l'action store()
     */
    public function store(DirectorsRequest $request){

        // J'enregistre un nouvel acteur dès que mon formulaire est valide (0 erreurs)

        $directors=new Directors();
        $directors->firstname=$request->firstname;
        $directors->lastname=$request->lastname;
        $directors->dob=$request->dob =date_create_from_format("d/m/Y",$request->dob);
        $directors->biography=$request->biography;
        $directors->note=$request->note;
        $directors->image=$request->image;

        //$request->name dans le formulaire

        $filename = ""; //define null
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $filename=$file->getClientOriginalName();

            //Move upload
            $destinationPath = public_path().'/uploads/directors/'; //path vers public
            $file->move($destinationPath,$filename); //move the image file into public/upload

        }
        $directors->image = asset("/uploads/directors/".$filename);
        $directors->save();

        //j'ecris une session message flash
        Session:: flash('success',"Le directeur {directors->firstname} {directors->lastname} a bien été crée");

        //je redirige
        return Redirect::route('directors.index');



    }

    /**
     * Actors delete
     */

    public function delete($id){

        $directors= Directors::find($id);
        $directors->delete();

        //j'ecris un message flash en session
        Session::flash('success',"L'acteur {$directors->firstname} {$directors->lastname} a bien été supprimé");

        //je redirige

        return Redirect::route('directors.index');
    }






}




?>