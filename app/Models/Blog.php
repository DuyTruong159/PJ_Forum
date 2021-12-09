<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\User;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';
    public $timestamps = false;

    public function Tag()
    {
        return $this -> belongsTo(Tag::class, 'TagId', 'Id');
    }

    public function Comment()
    {
        return $this -> hasMany(Comment::class, 'BlogId', 'Id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'UserId', 'Id');
    }
}
