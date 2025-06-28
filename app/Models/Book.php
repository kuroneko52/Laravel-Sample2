<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    //
    use HasFactory;
    protected $fillable = ['title', 'author_id'];

    public function author()
    {
        //N:1の関係を定義
        return $this->belongsTo(Author::class);
    }
}
