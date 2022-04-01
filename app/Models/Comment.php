<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function commentable(){
        return $this->morphTo();
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //Relacion uno a muchos poliformica
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commenteable');
    }
    public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactioneable');
    }
}
