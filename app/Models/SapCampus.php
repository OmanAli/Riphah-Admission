<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SapCampus extends Model
{
     protected $table = 'sap_campuses';
    protected $guarded = [];

    // public function program_sap()
    // {
    //     return $this->hasOne(SAPProgram::class, 'sap_campus_id');
    // }
}
