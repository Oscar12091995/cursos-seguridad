<?php

namespace App\Http\Controllers;
 
use App\Models\Course;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment as ApiPayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PaymentController extends Controller
{

  

    private $apiContext;


    
    public function checkout(Course $course){
        return view('payment.checkout', compact('course'));
    }

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                config('services.paypal.client_id'),     // ClientID
                config('services.paypal.client_secret') //clientSecret
            )
        );

        $this->apiContext->setConfig(
            array(
                'mode' => 'LIVE',
                'log.LogEnabled' => true,
                'log.FileName' => '../PayPal.log',
                'log.LogLevel' => 'INFO', // PLEASE USE `INFO` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
            )
        );  

       
    }

    public function pay(Course $course){

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),     // ClientID
                config('services.paypal.client_secret')      // ClientSecret
            )
        );

        $apiContext->setConfig([
        'mode' => 'sandbox',
        ]);


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($course->price->value);
        $amount->setCurrency('MXN');

        $transaction = new Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.approved', $course))
            ->setCancelUrl(route('payment.checkout', $course));
            
        $payment = new ApiPayment();
        $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions(array($transaction))
        ->setRedirectUrls($redirectUrls);
        try {
      
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        }
        catch (PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }

        
    }

    public function approved(Request $request, Course $course){
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                config('services.paypal.client_id'),     // ClientID
                config('services.paypal.client_secret')      // ClientSecret
            )
        );

        $apiContext->setConfig([
            'mode' => 'live',
           ]);

        $paymentId = $_GET['paymentId'];
        $payment = ApiPayment::get($paymentId, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId($_GET['PayerID']);
        $result = $payment->execute($execution, $this->apiContext);

        
        $course->students()->attach(auth()->user()->id);
        
        return redirect()->route('courses.status', $course);
    }

}
