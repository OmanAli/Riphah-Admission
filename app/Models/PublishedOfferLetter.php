<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PublishedOfferLetter extends Model
{
    protected $table = 'published_offer_letters';
    protected $guarded = [];

     public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }

     public function offerletter()
    {
        return $this->belongsTo(OfferLetter::class, 'offer_letter');
    }
}
