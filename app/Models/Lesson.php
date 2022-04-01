<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function getCompletedAttribute(){
        return $this->users->contains(auth()->user()->id);
    }
    
    //relacion uno a mucho inversa de secciones
    public function section(){
        return $this->belongsTo('App\Models\Section');
    }

    //relacion uno a mucho inversa de plataformas
    public function platform(){
        return $this->belongsTo('App\Models\Platform');
    }

    //relacion uno a uno 
    public function description(){
        return $this->hasOne('App\Models\Description');
    }

    //relacion muchos a mucho secciones
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    //relacion uno a uno polimorfica
    public function resource(){
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    //relacion uno a muchos polimorficas
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commenteable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactioneable');
    }

    //relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }

    public function image_lesson(){
        return $this->morphMany('App\Models\Image_Lesson', 'imageable');
    }
}
