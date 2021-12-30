<?php

namespace App\Models;

use App\Traits\Cacheable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use Cacheable;
    use HasFactory;

    protected $touches = ['card'];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }
}
