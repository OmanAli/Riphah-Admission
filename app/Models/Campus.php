<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = 'campuses';
    protected $guarded = [];

    public function programs()
    {
        return $this->hasMany(Program::class, 'campus_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'campus_id');
    }
    public function departments()
    {
        return $this->hasMany(Department::class, 'campus_id');
    }
    public function admission_sessions()
    {
        return $this->hasMany(AdmissionSession::class, 'campus_id');
    }
}
