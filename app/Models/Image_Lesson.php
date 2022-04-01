<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function imageable(){
        return $this->morphTo();
    }
}
