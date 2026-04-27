<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeAdmission extends Model
{
    protected $table = 'fee_admissions';
    protected $guarded = [];

    public function program()
    {
        return $this->belongsTo(Program::class, 'admitted_program_id');
    }

    public function appliation()
    {
        return $this->belongsTo(Application::class, 'oas_id');
    }
}
