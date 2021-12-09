<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;
use App\Models\Comment;

class User extends Model
{
    use HasFactory;

    protected $table = 'user';
    public $timestamps = false;

    public function Blog()
    {
        return $this -> hasMany(Blog::class, 'UserId', 'Id');
    }

    public function Comment()
    {
        return $this -> hasMany(Comment::class, 'UserId', 'Id');
    }
}
