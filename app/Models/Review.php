<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relación uno a muchos inversa de usuarios
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
