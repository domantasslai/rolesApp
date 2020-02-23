<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
       * Kai vartotojas prisijungia prie sistemos, ši funckija patikrina vartotojo role.
       * Jeigu varototjo role yra 'admin', jis yra nukreipiamas į admin puslapį, kur yra visų
       * registruotų vartootjų išklotinė.
       * Jeigu varototjo role yra nėra 'admin', jis yra nukreipiamas į home puslapį.
     */
     public function redirectTo(){
       if (Auth::user()->hasRole('admin')) {
         $this->redirectTo= route('admin.users.index');
         return $this->redirectTo;
       }
       return $this->redirectTo = '/';
     }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


}
