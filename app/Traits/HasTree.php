<?php

namespace App\Traits;

use App\Traits\HasMedia;
use App\Traits\HasCode;
use App\Traits\HasLink;
use App\Traits\HasParent;

trait HasTree
{
    use HasMedia, HasLink, HasParent, HasCode;
}
