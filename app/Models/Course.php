<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];
    protected $withCount = ['students'];

    const Borrador = 1;
    const Revision = 2;
    const Publicado = 3;

    //atributo para traer el rating del curso
    public function getRatingAttribute(){
        if($this->reviews_count){
            return round($this->reviews->avg('rating'), 1);
        }else{
            return 5;
        }
        
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    //query scopes
    public function scopeCategory($query, $category_id){
        if($category_id){
            return $query->where('category_id', $category_id);
        }
    }
    public function scopePrice($query, $price_id){
        if($price_id){
            return $query->where('price_id', $price_id);
        }
    }
    public function scopeLevel($query, $level_id){
        if($level_id){
            return $query->where('level_id', $level_id);
        }
    }

    
    
    //Relación uno a muchos inversa
    public function teacher(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    //Relación muchos a muchos
    public function students(){
        return $this->belongsToMany('App\Models\User');
    }

    //Relacion uno a muchos en reviews
    public function reviews(){
        return $this->hasMany('App\Models\Review');
    }

    //Relación uno a muchos inversa level
    public function level(){
        return $this->belongsTo('App\Models\Level');
    }
    
    //Relación uno a muchos inversa precios
    public function price(){
        return $this->belongsTo('App\Models\Price');
    }

    //Relación uno a muchos inversa categorias
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    //Relacion uno a muchos en requerimientos
    public function requirements(){
        return $this->hasMany('App\Models\Requirement');
    }

    //Relacion uno a muchos en metas
    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }

    //Relacion uno a muchos en secciones
    public function sections(){
        return $this->hasMany('App\Models\Section');
    }

    public function exams(){
        return $this->hasMany('App\Models\Quize');
    }

    //Relacion uno a muchos en audiensa
    public function audience(){
        return $this->hasMany('App\Models\Audience');
    }

    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }
    public function lessons(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
    
}
