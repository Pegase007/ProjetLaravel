<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     *Url apres success login
     */
    protected $loginPath = '/auth/login';

    /**
     * Url par defaut de redirection generale
     * When a user is successfully authenticated, they will be redirected to the /home URI
     * @var string
     */
    protected $redirectPath = '/admin/';
    /**
     * Url après déconnection
     */
    protected $redirectAfterLogout='/auth/login';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    protected $redirectTo='/auth/login';



    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout','account','modification']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:administrators',
            'password' => 'required|confirmed|min:6',
            'prenom'=>'required|max:255',
            'photo'=>'required|url',
            'ville'=>'required|max:100',
            'description'=>'required|max:500'



        ], [

            'required' => 'The :attribute field is required.',

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'prenom'=>$data['prenom'],
            'photo'=>$data['photo'],
            'ville'=>$data['ville'],
            'description'=>$data['description'],
             'trial_ends_at' => Carbon::now()->addDays(14),

        ]);
    }

    public function getLogin()
    {

            return view ('Authentification/login');
    }

    /**
     * Shows application registration form
     * @return \Illuminate\View\View
     */
    public function getRegister(){


        return view('Authentification/register');

    }

    public function account(){




        return view('Authentification/account');



    }

//
//    public function modification(Request $request){
//
//        $data = $request->all();
//
//        $user = Auth::user();
//        $user->name = $request->name;
//        $user->prenom = $request->name;
//        $user->photo = $request->name;
//
//        $user->save();
//
//        return Redirect::route('account');
//    }


}
