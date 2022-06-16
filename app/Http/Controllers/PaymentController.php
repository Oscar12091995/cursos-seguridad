<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Course;
use App\Services\Cart;
use Illuminate\Http\Request;
class PaymentController extends Controller
{

    

    public function checkout(Course $course) {
        return view('payment.checkout', compact('course'));
    }

    public function pay(Course $course) {
        // After Step 1
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),     // ClientID
                config('services.paypal.client_secret')      // ClientSecret
            )
        );

        $cart = new Cart;
        if (!$cart->hasProducts()) {
            return back()->with("message", ["danger", __("No hay productos para procesar")]);
        }

       
 
        // After Step 2
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');
 
        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($course->price->value);
        $amount->setCurrency('MXN');
 
        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);
 
        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.approved', $course))
            ->setCancelUrl(route('payment.checkout', $course));
 
        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

            $apiContext->setConfig([
                'mode' => 'sandbox',
               ]);
 
        // After Step 3
        try {
            $payment->create($apiContext);
            
            return redirect()->away($payment->getApprovalLink());
            $cart->clear();
 
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {

            echo $ex->getData();
            
        }
    }

    public function applyCoupon(Course $course){
        session()->remove("coupon");
        session()->save();

        $amount = $course->price->value;
        $code = request("coupon");
        $coupon = Coupon::available($code)->first();
        if (!$coupon) {
            return back()->with('danger', 'El cupón que has introducido no existe');
        }

        $totalCourses = $coupon->courses()->where("id");

        if ($totalCourses) {
            session()->put("coupon", $code);
            session()->save();

            if ($coupon->discount_type === Coupon::PERCENT) {
                $discount = ($course->price->value * $coupon->discount) / 100;
                $withDiscount = $amount - $discount;
            }
            if ($coupon->discount_type === Coupon::PRICE) {
                $withDiscount = $amount - $coupon->discount;
            }
            
            return back()->with('success','El cupón se ha aplicado correctamente', compact('withDiscount'));
            
                        
        }
        return back()->with('error', 'El cupón no se puede aplicar');

        

    }


    public function approved(Request $request, Course $course){
       /*  $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),     // ClientID
                config('services.paypal.client_secret')      // ClientSecret
            )
        );

        $paymentId = $_GET['paymentId'];
        $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);
        $execution = new \PayPal\Api\PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);
        $result = $payment->execute($execution, $apiContext); */
        
        $course->students()->attach(auth()->user()->id);
        
        return redirect()->route('courses.status', $course);
    }

    



}
