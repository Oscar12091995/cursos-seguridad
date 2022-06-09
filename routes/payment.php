<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('{course}/checkout', [PaymentController:: class, 'checkout'])->name('checkout');

Route::get('{course}/pay', [PaymentController:: class, 'pay'])->name('pay');

Route::get('{course}/approved', [PaymentController:: class, 'approved'])->name('approved');

Route::post('{course}/apply-coupon', [CourseController::class, 'applyCoupon'])->name('apply_coupon');



/* Route::get('{course}/pay', PaymentOrder::class)->name('pay'); */