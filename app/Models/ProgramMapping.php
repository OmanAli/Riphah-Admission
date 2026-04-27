<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramMapping extends Model
{
    protected $table = 'program_mappings';
    protected $guarded = [];
    public function program()
    {
        return $this->hasOne(Program::class, 'program_map_id');
    }
}
