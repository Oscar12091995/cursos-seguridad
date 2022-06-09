<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\Teacher\ManageCoupons;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    use ManageCoupons;
    
}
