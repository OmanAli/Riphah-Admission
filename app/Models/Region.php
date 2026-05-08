<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';
    protected $guarded = [];

    public function CampusRegion()
    {
        return $this->hasMany(Campus::class, 'region_id');
    }
     public function ApplicationRegion()
    {
        return $this->hasMany(Application::class, 'region_id');
    }
}
