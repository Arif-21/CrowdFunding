<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class OtpCode extends Model
{
    use UsesUuid;

    protected $fillable = ['otp', 'valid_until', 'user_id'];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
