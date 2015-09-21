<?php

namespace App\Http\Controllers;

use App\Model\Directors;


/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{

public function getBestDirectors(){

    $directors = Directors::all();

//    dump($directors->toJson());


    return response()->json($directors);



}



}


?>