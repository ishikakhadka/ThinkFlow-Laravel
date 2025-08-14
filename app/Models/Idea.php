<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{

    protected $withCount = ["likes"];
    protected $guarded=["id","created_at","updated_at"];
    // protected $fillable = ['content', 'likes'];
    use HasFactory;

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'idea_like')->withTimestamps();
    }

    public function scopeSearch($query,$search=" "){
        $query->where('content', 'like', "%" .$search. "%");
    }

    }

