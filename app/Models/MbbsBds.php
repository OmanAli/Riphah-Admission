<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MbbsBds extends Model
{
       protected $table = 'mbbs_bds';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
