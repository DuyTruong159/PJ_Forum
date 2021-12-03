<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';
    public $timestamps = false;

    public function Tag()
    {
        return $this -> belongsTo(Tag::class, 'TagId', 'Id');
    }
}
