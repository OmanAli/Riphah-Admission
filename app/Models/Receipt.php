<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $table = 'receipts';
    protected $guarded = [];

    public function oas_program()
    {
        return $this->belongsTo(Program::class, 'oas_id');
    }
}
