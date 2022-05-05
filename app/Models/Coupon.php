<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const PORCENTAJE = 'PERCENT';
    const PRECIO = 'PRICE';

    protected $fillable = [
        'user_id', 'code', 'discount_type',
        'discount', 'description', 'enabled', 'expires_at'
    ];

    protected $dates = [
        "expires_at"
    ];

    protected static function boot() {
        parent::boot();
        if (!app()->runningInConsole()) {
            self::saving(function ($table) {
                $table->user_id = auth()->id();
            });
        }
    }

    public function courses() {
        return $this->belongsToMany(Course::class);
    }

    public static function discountTypes() {
        return [
            self::PORCENTAJE => __("Porcentaje"),
            self::PRECIO => __("Fijo"),
        ];
    }
}
