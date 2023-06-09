<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'year',
        'writter',
        'synopsis',
        'image',
        'user_id',
        'category_id',
        'selfComment',
        'deal'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    public function deals() 
    {
        return $this->hasMany(Deal::class);
    }
}
