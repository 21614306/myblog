<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable ;

class User extends Model
{
    protected $table = 'users';

    protected $fillable = ['name','email','password'];

    protected $hidden = ['password','created_at','updated_at'];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }
}
