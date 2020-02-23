<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
  /**
     * ManyToMany ryšys su User::class,
     * Role::class gali turėti daug vartotojų, pvz:
     * 'admin' role gali turėti tik vienas arba daug vartotojų.
     * 'user' role turės visi kurie naujai prisiregistruoja prie sistemos.
   */
    public function users(){
      return $this->belongsToMany(User::class);
    }
}
