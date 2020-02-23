<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Gate;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    /**
       * Index funckija grąžiną visus užsiregistravusius vartotojus.
       * Visus užsiregistravusius vartotojus gali matyti vartotojas tik su 'admin' role.
     */
    public function index()
    {
        if (Gate::allows('manage-user')) {
          $users = User::all();
          $users->load('roles');

          return view('admin.users.index', compact('users'));
        }
        return redirect(route('home'));
    }
}
