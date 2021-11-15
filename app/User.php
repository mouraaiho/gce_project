<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
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


    static function getAllUsers($page = 1, $perPage = 15, $searchField = ''){
        $startAt = $perPage * ($page - 1);
        if($searchField == ''){
          $records =  DB::table('users')->get();
          $data['totalPages'] = ceil(count($records) / $perPage);
          $data['result'] = DB::table('users')
          ->offset($startAt)
          ->limit($perPage)->get();
        }else{
          $records =  DB::table('users')->orWhere('name', 'like' , '%'. $searchField .'%')->get();
          $data['totalPages'] = ceil(count($records) / $perPage);
          $data['result'] = DB::table('users')
          ->orWhere('name' , 'like' , '%'. $searchField .'%')
          ->offset($startAt)
          ->limit($perPage)->get();
        }
       
        return $data;
      }
}
