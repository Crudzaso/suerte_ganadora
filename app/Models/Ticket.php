<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Ticket extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'buy_date',
        'ticket_number',
        'user_id',
        'raffle_id',
    ];

    public function raffle()
    {
        return $this->belongsTo(Raffle::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function winner()
    {
        return $this->hasOne(Winner::class);
    }
}
