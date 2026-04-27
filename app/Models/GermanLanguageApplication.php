<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GermanLanguageApplication extends Model
{
    protected $table = 'german_language_applications';
    protected $guarded = [];

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
