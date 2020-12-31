<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Campaign extends Model
{
    use UsesUuid;

    protected $guarded = [];
}
