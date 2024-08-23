<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mongodb\Laravel\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
    protected $collection = 'posts';
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
