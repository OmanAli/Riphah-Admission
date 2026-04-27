<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
      protected $table = 'departments';
    protected $guarded = [];

     public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }
     public function programs()
    {
        return $this->hasMany(Program::class, 'department_id');
    }
}
