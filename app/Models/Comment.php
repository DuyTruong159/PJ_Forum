<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';
    public $timestamps = false;

    public function Blog()
    {
        return $this -> belongsTo(Blog::class, 'BlogId', 'Id');
    }

    public function Comment()
    {
        return $this -> belongsTo(Comment::class, 'UserId', 'Id');
    }
}
