<?php

namespace App\Models;

use App\Traits\Cacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use Cacheable;
    use HasFactory;

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
