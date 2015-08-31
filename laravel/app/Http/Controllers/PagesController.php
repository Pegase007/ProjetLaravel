<?php

namespace App\Http\Controllers;

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











}




?>