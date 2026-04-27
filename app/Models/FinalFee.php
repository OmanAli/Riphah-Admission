<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinalFee extends Model
{
    protected $table = 'final_fees';
    protected $guarded = [];

      public function program()
    {
        return $this->belongsTo(Program::class, 'oas_program_id');
    }
}
