<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasTree;
use App\Traits\HasLike;

class Freelancer extends Model
{
  use HasFactory, HasTree,HasLike;
  protected $guarded  = ['id'];
  protected $touches  = ['avatar'];
  protected $slug     = 'name';
  protected $casts = [
    'social' => 'json',
  ];
  public function user()
  {
      return  $this->belongsTo(User::class);
  }
  public function products()
  {
    return $this->hasMany(Product::class);
  }
  public function experiences()
  {
    return $this->hasMany(FreelancerExpe::class);
  }

  public function certificates()
  {
    return $this->hasMany(FreelancerCert::class);
  }

  public function educations()
  {
    return $this->hasMany(FreelancerEdu::class);
  }


  public function scopeSearch($query, $search)
  {
    if (isset($search->name)) {
      $query->where('name', 'like', "%$search->name%");
    }
    if (isset($search->job)) {
      $query->where('job', 'like', "%$search->job%");
    }
    if (isset($search->phone)) {
      $query->where('work_phone', 'like', "%$search->phone%");
    }
    if (isset($search->email)) {
      $query->where('work_email', 'like', "%$search->email%");
    }
    //$query->where('work_email', 'like', "%aa@kingpang.vn%");
    return $query;
  }


  static function boot()
  {
    parent::boot();
    static::deleting(function ($model) {
      $model->dropLink();
      $model->dropMedia();
    });

    static::saving(function ($model) {
      $model->codeReal();
      $model->codeNotNull();
    });
  }
}
