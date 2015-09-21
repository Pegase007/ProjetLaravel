<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     * Methode de chargement de mes politiques d'authorisation
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        //Je determine une politique d'utilisation sur mon user
        //is admin est le nom de ma politique de securité
        //et $user est mon utilisateur connecté
        $gate->define('superadmin',function($user){
//
//            if($user->super_admin ==1){
//                return true;
//            }
//            else{
//                return false;
//            }

            //ou en ternaire
            return $user->super_admin ==1? true: false;

        });

        // allows only user that created movie to delete it or //super_admin//

        $gate->define('hasmovie',function($user,$movie){
//            if($user->super_admin==1){return true};
            return $movie->administrators_id ==$user->id? true: false;

        });

        $gate->define('hasactors',function($user,$actors){

            return $actors->administrators_id ==$user->id? true: false;

        });
        $gate->define('authexpire',function($user){

            $date=new \DateTime('now');
            return new  \DateTime($user->trial_ends_at) > $date;

        });

    }
}
