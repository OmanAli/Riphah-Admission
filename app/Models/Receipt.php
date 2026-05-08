<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $table = 'receipts';
    protected $guarded = [];

    public function oas_application()
    {
        return $this->belongsTo(Application::class, 'oas_id', 'oas_id');
    }
}
