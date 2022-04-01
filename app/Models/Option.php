<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function question(){
        return $this->belongsTo('App\Models\Question');
    }

    public function result(){
        return $this->hasOne('App\Models\Result');
    }
}
