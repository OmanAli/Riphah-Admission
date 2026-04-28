<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferLetter extends Model
{
    protected $table = 'offer_letters';
    protected $guarded = [];

    public function oas_prg()
    {
        return $this->belongsTo(Program::class, 'oas_program_id');
    }

    public function offerletter()
    {
        return $this->hasMany(PublishedOfferLetter::class, 'offer_letter');
    }
}
