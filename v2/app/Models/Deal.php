<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_id',
        'user_id',
        'text',
        'deal_book_id',
        'finish',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
