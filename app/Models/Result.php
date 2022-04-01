<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'quize_id', 'point', 'correct','wrong'];
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function quiz(){
        return $this->belongsTo('App\Models\Quiz');
    }
}
