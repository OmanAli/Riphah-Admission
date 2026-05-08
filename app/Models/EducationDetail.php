<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
     protected $table = 'education_details';
    protected $guarded = [];

    public function application()
    {
        return $this->belongsTo(Application::class, 'oas_id', 'oas_id');
    }

}
