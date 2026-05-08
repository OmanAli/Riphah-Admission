<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationDocument extends Model
{
    protected $table = 'education_documents';
    protected $guarded = [];
    public function documents()
    {
        return $this->belongsTo(Application::class, 'oas_id', 'oas_id');
    }
}
