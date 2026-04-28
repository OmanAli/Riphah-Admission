<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'programs';
    protected $guarded = [];

    public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function program_map()
    {
        return $this->belongsTo(ProgramMapping::class, 'program_map_id');
    }

    public function final_program_fee()
    {
        return $this->hasOne(FinalFee::class, 'oas_program_id');
    }
    public function receipts()
    {
        return $this->hasMany(Receipt::class, 'oas_id');
    }

    public function fee_admissions()
    {
        return $this->hasMany(FeeAdmission::class, 'admitted_program_id');
    }

    public function offer_letter()
    {
        return $this->hasMany(OfferLetter::class, 'oas_program_id');
    }
    // public function program_preference_1()
    // {
    //     return $this->hasMany(Application::class, 'program_preference_1');
    // }

    // public function program_preference_2()
    // {
    //     return $this->hasMany(Application::class, 'program_preference_2');
    // }

    // public function program_preference_3()
    // {
    //     return $this->hasMany(Application::class, 'program_preference_3');
    // }

    // public function program_preference_4()
    // {
    //     return $this->hasMany(Application::class, 'program_preference_4');
    // }
}
