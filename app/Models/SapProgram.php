<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SapProgram extends Model
{
    protected $table = 'sap_programs';
    protected $guarded = [];

    // public function campus_sap()
    // {
    //     return $this->belongsTo(SAPCampus::class, 'sap_campus_id');
    // }
}
