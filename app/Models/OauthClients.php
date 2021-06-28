<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Media;
use App\Models\Link;

class OauthClients extends Model
{
    protected $guarded  = ['id'];
    use HasFactory;
}
