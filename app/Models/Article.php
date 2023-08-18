<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Artist;
use App\Models\Tag;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description'
    ];

    //Relation One To One
    public function Image(){
        return $this->hasOne(Image::class);
    }

    //Relation One To Many
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    //Relation One To Many - afiiche le dernier commentaire
    public function latestComment(){
        return $this->hasOne(Comment::class)->latestOfMany();
    }

    //Relation One To Many - afiiche le premier commentaire
    public function oldestComment(){
        return $this->hasOne(Comment::class)->oldestOfMany();
    }

    //Relation Has One Trough - entre trois table - avec 2 clées étrangères dans 2 tables respectives
    public function imageArtist(){
        return $this->hasOneThrough(Artist::class, Image::class);
    }

    //Relation Many To Many entre 3 tables Tag, articleTag(table pivot), article
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
