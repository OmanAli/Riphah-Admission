<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublishedOfferLetter extends Model
{
    protected $table = 'published_offer_letters';
    protected $guarded = [];

     public function application()
    {
        return $this->belongsTo(Application::class, 'oas_id', 'oas_id');
    }

     public function offerletter()
    {
        return $this->belongsTo(OfferLetter::class, 'offer_letter');
    }

     public function offered_program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
