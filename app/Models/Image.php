<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\Artist;
class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'path',
        'article_id'
    ];

    public function article(){
        return $this->belongsTo(Article::class);
    }

    public function artist(){
        return $this->hasOne(Artist::class);
    }
}
