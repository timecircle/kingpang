<?php

namespace App\Traits;

use App\Models\Like;
use App\Models\User;

trait HasLike
{
    public function likes()
    {
        return $this->morphMany(Like::class, 'model');
    }

    public function liked(User $user)
    {
        $like    =   $this->getLike($user);
        
        if (empty($like)) {
            Like::insert([
                'model_id'  => $this->id,
                'model_type' => get_class($this),
                'user_id'   =>  $user->id,
            ]);
            return true;
        }
        $like->delete();
        return false;
    }

    public function getLike(User $user)
    {
        return Like::whereUserId($user->id)->whereModelType(get_class($this))->whereModelId($this->id)->first(); 
    }
}
