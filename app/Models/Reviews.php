<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'user_id',
        'raffle_id',
        'comment',
        'rating',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with the Raffle that the review is for.
     */
    public function raffle()
    {
        return $this->belongsTo(Raffle::class);
    }
}
