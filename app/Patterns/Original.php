<?php

namespace App\Patterns;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Traits\HasMedia;

use App\Models\Link;
use App\Models\User;
use App\Models\Media;

class Original extends Model
{
    use HasFactory;
    use HasMedia;
    protected $guarded  = ['id'];
    protected $pretty   = 'name';
    protected $touches  = ['avatar'];
    public function user()
    {
        return  $this->belongsTo(User::class);
    }
    /*
    public static function findBy($pretty){
      $link = Link::findBy($pretty);
      if(isset($link)){
          return static::whereLinkId($link->id)->first();
      }
    }
*/

    public function link()
    {
        return $this->morphOne(Link::class, 'model');
    }

    public function settings()
    {
        return $this->morphMany(Media::class, 'model');
    }


    public static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            foreach ($model->medias as $media) {
                $media->delete();
            }
            if ($model->avatar)
                $model->avatar->delete();
            if (isset($model->link))
                $model->link->delete();
        });

        static::saving(function ($model) {
            if (empty($model->code)) {
                $model->code  = uniqid();
            }
        });
        static::creating(function ($model) {
            if (static::whereCode($model->code)->exists()) {
                $model->code .= uniqid();
            }
        });
        static::created(function ($model) {
            Link::new($model, $model->pretty);
        });
    }
}
