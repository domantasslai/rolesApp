<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

     /**
      * show() funkcija skirta už profilio informacijos lango atvaizdavimą.
     */
    public function show(User $user)
    {
      if (auth()->user()->id === $user->id) {
          return view('profiles.show', compact('user'));
      }
      return redirect(route('user.show', auth()->user()));
    }

    /**
      * edit() funkcija skirta už profilio edit lango atvaizdavimą.
    */
    public function edit(User $user)
    {
        if (auth()->user()->id === $user->id) {
          return view('profiles.edit', compact('user'));
        }
        return redirect(route('user.show', auth()->user()));
    }

    /**
     * Update funkcija skirta už profilio duomenų atnaujinimą.
    */
    public function update(Request $request, User $user)
    {
        $data = $this->validateData();
        $user->update($data);
        return redirect(route('user.show', $user->id));
    }

    /**
     * validateData funkcija skirta už įvedamų duomenų validaciją.
    */
    public function validateData()
    {
        return request()->validate([
          'name' => ['required', 'min:3', 'max:100'],
          'email' => ['required', 'email', 'max:100']
        ]);
    }
}
