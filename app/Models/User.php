<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Blog;
use App\Models\Comment;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';
    public $timestamps = false;
    protected $fillable = ['username','password'];

    public function Blog()
    {
        return $this -> hasMany(Blog::class, 'UserId', 'Id');
    }

    public function Comment()
    {
        return $this -> hasMany(Comment::class, 'UserId', 'Id');
    }
}
