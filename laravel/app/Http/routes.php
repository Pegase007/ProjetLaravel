<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/**
 * Import de routes implicites vers mes controlleurs preconcus car ces controlleurs usent des
 * traits avec des fonctionnalités de l'authentification deja faites (login,logout,register...)
 */
Route::controllers([

    'auth'=>'Auth\AuthController',
    'password'=>'Auth\PasswordController',

]);

//SUPER GROUPE
Route::group([ 'prefix' => 'admin', 'middleware' => 'auth'], function() {


    Route::get('/account', ['uses' => 'Auth\AuthController@account', 'as' => 'account']);
    Route::post('/update', ['uses' => 'Auth\AuthController@modification', 'as' => 'update']);



    Route::controller('api','ApiController');






        Route::get('/', ['uses' =>'PagesController@home','as'=>'home']);

        Route::post('/newmessages', ['uses' =>'PagesController@newmessages','as'=>'newmessages']);


        Route::get('/advanced', ['uses' =>'PagesController@advanced','as'=>'advanced']);

        Route::get('/task', ['uses' =>'PagesController@task','as'=>'task']);

        Route::post('/nwtask', ['uses' =>'PagesController@nwtask','as'=>'nwtask']);

        Route::post('/position', ['uses' =>'PagesController@position','as'=>'position']);


        Route::post('/clear', ['uses' =>'PagesController@clear','as'=>'clear']);


        Route::get('/pro', ['uses' =>'PagesController@pro','as'=>'pro']);

        Route::get('/state/{id}', ['uses' =>'PagesController@state','as'=>'state'])
            ->where('id','[0-9]+');

        Route::post('/flashmovie',['uses' => 'PagesController@flashmovie','as'=>'flashmovie']);




        /**
         * Permet de connecter l'URI contact à la page Contact
         */
        Route::get('/contact',['uses' => 'PagesController@contact','as'=>'contact']);
        /**
         * Permet de connecter l'URI mentionlegales à la page MentionLegales
         * Le /Pages permet de cibler le fichier Page dans lequel se trouvent les pages
         */

        Route::get('/mentionlegales',['uses' => 'PagesController@mention', 'as' =>'mentions']);

        /**
         * Permet de connecter l'URI faq à la page FAQ
         */
        Route::get('/faq',['uses' =>'PagesController@faq', 'as'=>'faq' ]);

    
        Route::get('/search',['uses' =>'PagesController@search', 'as'=>'search' ]);





    /**
     * GROUPE DE ROUTES actors
     */

         Route::group(['prefix' =>'actors', 'as'=>'actors'],function(){

        /**
         * Actors index liste les acteurs
         */
        Route::get('/index/{ville?}',['uses' =>'ActorsController@index','as'=>'.index']);
        /**
         * Actors index lit un seul acteur
         */
        Route::get('/read/{id}',['uses' =>'ActorsController@read','as'=>'.read'])
            ->where('id','[0-9]+');

        /**
         * Actors index GET crée des  acteurs
         */
        Route::get('/create', ['uses' => 'ActorsController@create', 'as'=>'.create']);
        /**
         * Actors index  POST va enregistrer les informations du formulaire
         */
        Route::post('/create', ['uses' => 'ActorsController@store', 'as'=>'.post']);
        /**
        /**
         * Actors index met à jours les acteurs
         */
        Route::get('/update/{id}',['uses' =>'ActorsController@update','as'=>'.update'])
            ->where('id','[0-9]+');
        /**
         * Actors index supprime des acteurs
         */
        Route::get('/delete/{id}',['uses' =>'ActorsController@delete','as'=>'.delete'])
            ->where('id','[0-9]+');

        Route::post('/thumb', ['uses' => 'ActorsController@thumb', 'as'=>'.thumb']);



    });



    /**
     * GROUPE DE ROUTES directors
     */



         Route::group(['prefix' =>'directors', 'as'=>'directors' ],function() {
        /**
         * Actors index liste les acteurs
         */
        Route::get('/index/{ville?}', ['uses' => 'DirectorsController@index', 'as'=> '.index']);

        /**
         * Actors index lit un seul acteur
         */
        Route::get('/read/{id}', ['uses' => 'DirectorsController@read','as'=> '.read'])
            ->where('id','[0-9]+');
        /**
         * Directors index GET crée des  directors
         */
        Route::get('/create', ['uses' => 'DirectorsController@create', 'as'=>'.create']);
        /**
         * Directors index  POST va enregistrer les informations du formulaire
         */
        Route::post('/create', ['uses' => 'DirectorsController@store', 'as'=>'.post']);

        /**
         * Actors index met à jours les acteurs
         */
        Route::get('/update/{id}', ['uses' => 'DirectorsController@update','as'=> '.update'])
            ->where('id','[0-9]+');
        /**
         * Actors index supprime des acteurs
         */
        Route::get('/delete/{id}', ['uses' => 'DirectorsController@delete','as'=> '.delete'])
            ->where('id','[0-9]+');

    });




    /**
     * GROUPE DE ROUTES movies
     */



         Route::group(['prefix' =>'movies', 'as' =>'movies'],function() {
        /**
         * Movies index liste les movies
         * 'as'=>'movies.index' permet de donner un alias pour joindre cette adresse
         */
        Route::get('/form', ['uses' => 'MoviesController@form', 'as'=>'.form']);

        Route::get('/index', ['uses' => 'MoviesController@index', 'as'=>'.index']);

        /**
         * Movies index lit un seul movies
         */
        Route::get('/read/{id}', ['uses' => 'MoviesController@read', 'as'=>'.read'])
            ->where('id','[0-9]+');

             /**
         * Movies index lit un seul movies
         */
        Route::post('/comment/{id}', ['uses' => 'MoviesController@comment', 'as'=>'.comment'])
            ->where('id','[0-9]+');


        /**
         * Movies index GET crée des  directors
         */
        Route::get('/create', ['uses' => 'MoviesController@create', 'as'=>'.create']);
        /**
         * Movies index  POST va enregistrer les informations du formulaire
         */
        Route::post('/create', ['uses' => 'MoviesController@store', 'as'=>'.post']);


        Route::get('/delete/{id}', ['uses' => 'MoviesController@delete', 'as'=>'.delete'])
             ->where('id','[0-9]+');


        /**
         * Movies index met à jours les movies
         */
        Route::get('/update/{id}/{action}', ['uses' => 'MoviesController@update' , 'as'=>'.update'])
            ->where('id','[0-9]+');

        /**
         * Movies condition permet de trier la table
         */
        Route::get('/condition/{condition}', ['uses' => 'MoviesController@condition' , 'as'=>'.condition']);


        Route::any('/actions', ['uses' => 'MoviesController@actions' , 'as'=>'.actions']);

        Route::get('/trash', ['uses' => 'MoviesController@trash' , 'as'=>'.trash']);

        Route::get('/restore/{id}', ['uses' => 'MoviesController@restore' , 'as'=>'.restore'])
            ->where('id','[0-9]+');


        Route::post('/handlefav', ['uses' => 'MoviesController@fav', 'as'=>'.fav']);

        Route::get('/favbox', ['uses' => 'MoviesController@favbox', 'as'=>'.favbox']);




        //    /**
        //     * Movies index met à jours les movies
        //     */
        //    Route::get('/updatecover/{id}', ['uses' => 'MoviesController@updatecover', 'as'=>'.updatecover'])
        //        ->where('id','[0-9]+');


        /**
         * Movies index supprime des movies
         */
        Route::get('/delete/{id}', ['uses' => 'MoviesController@delete', 'as'=>'.delete'])
            ->where('id','[0-9]+');

        /**
         * Movies search recherche des films avec des attributs par default
         */
        Route::get('/search/{languages?}/{visible?}/{duree?}', ['uses' => 'MoviesController@search', 'as' => '.search'])
            ->where (['languages'=> '^(en|es|fr)$' , 'visible'=>'0|1','duree'=>'[1-9]+']);




    });


    /**
     * GROUPE DE ROUTES users
     */



        Route::group(['prefix' =>'users','as'=>'users'],function() {
        /**
         * Movies index liste les movies
         * 'as'=>'movies.index' permet de donner un alias pour joindre cette adresse
         */
        Route::get('/index', ['uses' => 'UsersController@index', 'as'=>'.index']);
        /**
         * Movies index lit un seul movies
         */
        Route::get('/read/{id}', ['uses' => 'UsersController@read', 'as'=>'.read']);
        /**
         * Movies index crée des movies
         */
        Route::get('/create', ['uses' => 'UsersController@create', 'as'=>'.create']);
        /**
         * Movies index met à jours les movies
         */
        Route::get('/update/{id}', ['uses' => 'UsersController@update', 'as'=>'.update'])
            ->where('id','[0-9]+');
        /**
         * Movies index supprime des movies
         */
        Route::get('/delete/{id}', ['uses' => 'UsersController@delete', 'as'=>'.delete'])
            ->where('id','[0-9]+');

        /**
         * Movies search recherche des films avec des attributs par default
         */
        Route::get('/search/{zipcode?}/{ville?}/{enabled?}', ['uses' => 'UsersController@search', 'as' => '.search'])
            ->where (['zipcode'=> '[0-9]{5}|[0-9]{2}|[*]' , 'ville'=>'[a-zA-Z-]+|[*]','enabled'=>'0|1|[*]']);




    });


         Route::group(['prefix' =>'cinema', 'as'=>'cinema'],function() {
        /**
         * Cinema index liste les movies
         * 'as'=>'movies.index' permet de donner un alias pour joindre cette adresse
         */
        Route::get('/index', ['uses' => 'CinemaController@index', 'as'=>'.index']);
        /**
         * Cinema index lit un seul movies
         */
        Route::get('/read/{id}', ['uses' => 'CinemaController@read', 'as'=>'.read']);
        /**
         * Cinema index crée des movies
         */
        Route::get('/create', ['uses' => 'CinemaController@create', 'as'=>'.create']);
        /**
         * Cinema index met à jours les movies
         */
        Route::get('/update/{id}', ['uses' => 'CinemaController@update', 'as'=>'.update'])
            ->where('id','[0-9]+');
        /**
         * Cinema index supprime des movies
         */
        Route::get('/delete/{id}', ['uses' => 'CinemaController@delete', 'as'=>'.delete'])
            ->where('id','[0-9]+');

        /**
         * Cinema search recherche des films avec des attributs par default
         */
        Route::get('/search', ['uses' => 'CinemaController@cinema', 'as' => '.search']);




    });

          Route::group(['prefix' =>'category', 'as'=>'category'],function() {
        /**
         * Category index liste les movies
         * 'as'=>'movies.index' permet de donner un alias pour joindre cette adresse
         */
        Route::get('/index', ['uses' => 'CategoryController@index', 'as'=>'.index']);
        /**
         * Category index lit un seul movies
         */
        Route::get('/read/{id}', ['uses' => 'CategoryController@read', 'as'=>'.read']);
        /**
         * Category index GET crée des  directors
         */
        Route::get('/create', ['uses' => 'CategoryController@create', 'as'=>'.create']);
        /**
         * Category index  POST va enregistrer les informations du formulaire
         */
        Route::post('/create', ['uses' => 'CategoryController@store', 'as'=>'.post']);
        /**
         * Category index met à jours les movies
         */
        Route::get('/update/{id}', ['uses' => 'CategoryController@update', 'as'=>'.update'])
            ->where('id','[0-9]+');
        /**
         * Category index supprime des movies
         */
        Route::get('/delete/{id}', ['uses' => 'CategoryController@delete', 'as'=>'.delete'])
            ->where('id','[0-9]+');

        /**
         * Category search recherche des films avec des attributs par default
         */
        Route::get('/search', ['uses' => 'CategoryController@cinema', 'as' => '.search']);




    });



    //Route::controller('cinema','CinemaController');
    //
    //Route::controller('category','CategoryController');


         Route::group(['prefix' =>'comments', 'as'=>'comments'],function() {

        /**
         * Gets comments page
         */
        Route::get('/index', ['uses' => 'CommentsController@index', 'as' => '.index']);


        Route::post('/comedit', ['uses' => 'CommentsController@comedit', 'as' => '.comedit']);

        /**
         * Category index supprime des movies
         */
        Route::get('/delete/{id}', ['uses' => 'CommentsController@delete', 'as'=>'.delete'])
            ->where('id','[0-9]+');

             /**
              * Gets comments fav
              */
        Route::post('/fav', ['uses' => 'CommentsController@fav', 'as' => '.fav']);




         });


    Route::group(['prefix' =>'sessions', 'as'=>'sessions'],function() {

        Route::get('/index', ['uses' => 'SessionsController@index', 'as'=>'.index']);

        Route::get('/ajax',['uses' => 'SessionsController@ajax','as'=>'.ajax']);

        Route::get('/tasks',['uses' => 'SessionsController@tasks','as'=>'.tasks']);

        Route::get('/review',['uses' => 'SessionsController@review','as'=>'.review']);

        Route::get('/users',['uses' => 'SessionsController@users','as'=>'.users']);

        Route::get('/boxmovie',['uses' => 'SessionsController@boxmovie','as'=>'.boxmovie']);


    });


    /**
     * Un systeme de routing peux renvoyer une view ou un text
     */

        Route::get('/toto',function(){

            return "<h3>TOTO</h3>";

        });

//  FIN SUPER GROUP
});
