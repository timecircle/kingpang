<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Spatie\Permission\Traits\HasRoles;
use App\Models\Freelancer;
use App\Models\Device;
use App\Models\Like;
use App\Models\Customer;

class User extends Authenticatable
{
    use  HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'admin_role',
        'firebase_uid',
        'firebase_token',
        'login_at',
        'login_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleAttribute(){
      if($this->is_admin){
          return empty($this->admin_role) ? 'admin' :  $this->admin_role;
      }
      return 'guest';
    }

    function freelancer(){
        return $this->hasOne(Freelancer::class);
    }

    function likes(){
        return $this->hasMany(Like::class);
    }

    function devices(){
        return $this->hasMany(Device::class);
    }

    function customers(){
        return $this->hasMany(Customer::class);
    }




    public function customerOf($freelancer,$auto = false){
        $query  = Customer::whereFreelancerId($freelancer)
          ->whereUserId($this->id);
        if($auto) {
            return $query->firstOrCreate([
              'user_id'       =>  $this->id,
              'contact_email' =>  $this->email,
              'freelancer_id' =>  $freelancer
            ]);
        }
        return $query->first();
    }


}
