<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Role extends Model
{
    use UsesUuid;

    protected $fillable = [
        'name',
    ];
    
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

}
