<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'login_at',
        'access_at',
        'access_token',
        'os',
        'name',
        'version',
        'user_id',
        'screen_width',
        'screen_height',
        'app_version'
    ];

    public static function findToken($token){
        return static::whereAccessToken($token)->first();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function login($user){
        $this->update([
          'user_id'    =>  $user->id,
          'login_at'  =>   now(),
        ]);
    }

    public function logout(){
        $this->update([
          'user_id'    =>  null,
          'login_at'  =>   null
        ]);
    }
}
