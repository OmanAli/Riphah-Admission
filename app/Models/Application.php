<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';
    protected $guarded = [];

    public function appliedcampus()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function education_detail()
    {
        return $this->hasOne(EducationDetail::class, 'application_id');
    }

    public function education_document()
    {
        return $this->hasOne(EducationDocument::class, 'application_id');
    }

    public function preferenceOne()
    {
        return $this->belongsTo(Program::class, 'program_preference_1');
    }

    public function preferenceTwo()
    {
        return $this->belongsTo(Program::class, 'program_preference_2');
    }

    public function preferenceThree()
    {
        return $this->belongsTo(Program::class, 'program_preference_3');
    }

    public function preferenceFour()
    {
        return $this->belongsTo(Program::class, 'program_preference_4');
    }

    public function fee_admission()
    {
        return $this->hasOne(FeeAdmission::class, 'oas_id', 'oas_id');
    }

    public function getStatusLabelAttribute()
    {
        return match ($this->application_status) {
            0 => 'Submitted',
            1 => 'Approved',
            2 => 'Rejected'
        };
    }

    public function getProgAttribute()
    {
        return match ($this->program) {
            'A1' => 'German Language - A1',
            'A2' => 'German Language - A2',
            'B1' => 'German Language - B1',
            'B2' => 'German Language - B2',
        };
    }

    public function getProcessingFeeAttribute()
    {
        $programIds = array_filter([
            $this->program_preference_1,
            $this->program_preference_2,
            $this->program_preference_3,
            $this->program_preference_4,
        ]);

        $maxFeeRecord = FinalFee::whereIn('oas_program_id', $programIds)
            ->orderByDesc('processingFee')
            ->first();

        return $maxFeeRecord->processingFee ?? 0;
    }
}
