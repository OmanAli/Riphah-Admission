<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdmissionSession extends Model
{
    protected $table = 'admission_sessions';
    protected $guarded = [];

    public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }
}
