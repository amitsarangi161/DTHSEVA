<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PaytmWallet;

class PaytmController extends Controller
{   
     /**
     * Redirect the user to the Payment Gateway.
     *
     * @return Response
     */
    public function pay() {

        $payment = PaytmWallet::with('receive');

        $payment->prepare([
          'order' => 89, // your order id taken from cart
          'user' => 'Cust_id_16', // your user id
          'mobile_number' => 79785477671, // your customer mobile no
          'email' => 'hungerforcode@gmail.com', // your user email address
          'amount' => 1.00, // amount will be paid in INR.
          'callback_url' => 'http://localhost:8000/payment/status' // callback URL
        ]);
        
        return $payment->receive();
    }

    /**
     * Obtain the payment information.
     *
     * @return Object
     */
    public function paymentCallback()
    {   
        $transaction = PaytmWallet::with('receive');
        
        $response = $transaction->response(); 

        dd($response['ORDERID']);
       
        // To get raw response as array
        //Check out response parameters sent by paytm here -> http://paywithpaytm.com/developer/paytm_api_doc?target=interpreting-response-sent-by-paytm
        
        if($transaction->isSuccessful()){


        }else if($transaction->isFailed()){
          //Transaction Failed
        }else if($transaction->isOpen()){
          //Transaction Open/Processing
        }
        $transaction->getResponseMessage(); //Get Response Message If Available
        //get important parameters via public methods
        $transaction->getOrderId(); // Get order id

        $transaction->getTransactionId(); // Get transaction id
    }    
}
