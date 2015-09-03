<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller{
    /**
     * Page Contact
     */
    public function contact(){

        return view ('Pages/Contact');

    }

    /**
     * Page Mention Legales
     */
    public function mention(){

        return view ('Pages/MentionLegales');
    }

    /**
     * Page FAQ
     */
    public function faq(){

        return view ('Pages/Faq');

    }

    public function home(){

        return view('welcome');
    }


    public function search(Request $request){

//Recuperer le champ request securisé
        $title=$request->input('title');
        $lang=$request->input('lang');


        return view('Pages/search');
    }







}




?>