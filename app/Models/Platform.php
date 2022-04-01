<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //relacion uno a mucho de leccion
    public function lessons(){
        return $this->hasMany('App\Models\Lesson');
    }
}
