<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;
use App\User;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
       * ManyToMany ryšys su Role::class,
       * User::class gali turėti daug roliu, šiai akimirkai yra tik dvi roles:
       * 'user' ir 'admin'.
     */
    public function roles(){
      return $this->belongsToMany(Role::class);
    }

    /**
       * Su šia funkcija tikrinsiu ar autentifikuotas vartotojas turi konkrečią rolę;
       * pvz.: useris turi role 'admin', 'owner' ir 'student' , tada jis galės pasiekti funkciją 'UsersController@index',
       * jeigu vartotojas turi tam role ($role):
       * grąžinama reikšmė yra true ir vartotojui leidžiama pasiekti duomenis,
       * jeigu vartotojas neturi tam roles ($role):
       * grąžinama reikšmė yra false ir vartotojui neleidžiama pasiekti duomenis.
     */
    public function hasAnyRoles($roles){
      if ($this->roles()->whereIn('name', $roles)->first()) {
        return true;
      }
      return false;
    }

    /**
       * Su šia funkcija tikrinsiu ar autentifikuotas vartotojas turi konkrečią rolę;
       * pvz.: useris turi role 'admin', tada jis galės pasiekti funkciją 'UsersController@index',
       * jeigu vartotojas turi tam role ($role):
       * grąžinama reikšmė yra true ir vartotojui leidžiama pasiekti duomenis,
       * jeigu vartotojas neturi tam roles ($role):
       * grąžinama reikšmė yra false ir vartotojui neleidžiama pasiekti duomenis.
     */
    public function hasRole($role){
      if ($this->roles()->where('name', $role)->first()) {
        return true;
      }
      return false;
    }
}
