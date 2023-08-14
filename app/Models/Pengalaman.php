<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengalaman extends Model
{
    use HasFactory;

    protected $table = 'pengalaman';

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'pengalamanpengunjung',
    ];

    

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
}
