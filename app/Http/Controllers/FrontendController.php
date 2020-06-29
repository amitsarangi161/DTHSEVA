<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;
use App\product;
use App\customer;
use Session;
use App\package;
use Carbon\Carbon;
use App\otp;
use App\order;
use App\orderaddress;
use App\packagechannel;
use App\category;
use App\channel;
use App\brand;
use App\review;
use App\cancelorder;
use App\company;
use App\recharge;
use App\paytmrecharge;
use Illuminate\Support\Facades\Input;
use App\rechargeorder;
use App\wallet;
use PaytmWallet;

use App\Classes\Instamojo;
use App\rechargeticket;
use App\saleschannel;
use App\coupon;
use App\subscribe;
use App\response;
use DB;
use App\Mobileoperator;
use App\Mobilerechargeorder;
use App\onepayresponse;
use App\paytmresponse;

class FrontendController extends Controller
{

    public function paytmWebhookResponse(Request $request)
    {
         $response=new paytmresponse();
         $response->response=json_encode($request->all());
         $response->save();
    }

     public function getOnepayBalance(Request $request)
     {
        $userid=env('RECHARGE_API_USERID','');
        $password=env('RECHARGE_API_PASSWORD','');
        $mobno=env('RECHARGE_API_MOBILE_NO','');
        $smspin=env('RECHARGE_API_SMSPIN','');
        $balanceUrl='http://www.onepayexpress.com/OpayeAdmin/RechargeAPI.aspx?UserID='.$userid.'&Password='.$password.'&MobileNo='.$mobno.'&Message=BAL$'.$smspin;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET',$balanceUrl);
        $sta=$response->getBody();
        $arr=explode("=",$sta);


        return $arr[1];
     }

     public function mobilerecharge()
     {
         $operators=Mobileoperator::all();

         return view('mobilerecharge',compact('operators'));
     }

    public function onepayresponse(Request $request)
    {
      // return $request->all();


      
         $response=new response();
         $response->api=json_encode($request->all());
         $response->save();

         $onepayresponse=new onepayresponse();
         $onepayresponse->resid=$request->ID;
         $onepayresponse->tno=$request->TNO;
         $onepayresponse->st=$request->ST;
         $onepayresponse->stmsg=$request->STMSG;
         $onepayresponse->tid=$request->TID;
         $onepayresponse->oprtid=$request->OPRTID;
         $onepayresponse->mobile=$request->Mobile;
         $onepayresponse->amount=$request->Amount;
         $onepayresponse->prb=$request->PRB;
         $onepayresponse->pob=$request->POB;
         $onepayresponse->dp=$request->DP;
         $onepayresponse->dr=$request->DR;
         $onepayresponse->save();
         
        if (strpos($onepayresponse->tno,'DTH') !== false) {
             
        $rechargeorder=rechargeorder::where('trnid',$onepayresponse->tno)->update(['orderstatus'=>strtoupper($onepayresponse->stmsg)]);


        $rhg=rechargeorder::where('trnid',$onepayresponse->tno)->first();
                     
                     $dthop=brand::where('id',$rhg->brandid)->first();
                     $per=$dthop->cashback_percent;
       $chk_wallet_deduction=$rhg->wallet_deduction;
    if ($onepayresponse->stmsg=='Success') {
          $r=rechargeorder::where('trnid',$onepayresponse->tno)->first();
          $r->paymentstatus='PAID';
          $r->save();

        if($rhg->use_wallet='Y' && $chk_wallet_deduction>0)
        {
            $wallet=new wallet();
            $wallet->user_id=$rhg->user_id;
            $wallet->order_id=$rhg->uniqueoid;
            $wallet->credit=0;
            $wallet->debit=$chk_wallet_deduction;
            $wallet->addedby=$rhg->user_id;
            $wallet->type='DTH';
            $wallet->save();
        }
        if($per>0)
            {
                         $cashback_amt=number_format((float)($per/100)*($rhg->amount), 2, '.', '');
                         if ($cashback_amt>0) {
                            $chk=wallet::where('order_id',$rhg->uniqueoid)->where('credit','>',0)->where('type','DTH')->get();

           if(sizeof($chk)==0)
            {
            $wallet=new wallet();
            $wallet->user_id=$rhg->user_id;
            $wallet->order_id=$rhg->uniqueoid;
            $wallet->credit=$cashback_amt;
            $wallet->debit=0;
            $wallet->addedby=$rhg->user_id;
            $wallet->type='DTH';
            $wallet->save();
            }
                         }
                      }
                      
                }
          }

          elseif(strpos($onepayresponse->tno,'MOB') !== false)
          {
            //return $onepayresponse->stmsg;
                     $rechargeorder=Mobilerechargeorder::where('trnid',$onepayresponse->tno)->update(['orderstatus'=>strtoupper($onepayresponse->stmsg)]);

                      $rhg=Mobilerechargeorder::where('trnid',$onepayresponse->tno)->first();
                     $mobop=Mobileoperator::where('id',$rhg->brandid)->first();
                     $per=$mobop->cashback_percent;
                    $chk_wallet_deduction=$rhg->wallet_deduction;
                if ($onepayresponse->stmsg=='Success') {

                  $r=Mobilerechargeorder::where('trnid',$onepayresponse->tno)->first();
                  $r->paymentstatus='PAID';
                  $r->save();

                      if ($rhg->use_wallet='Y' && $chk_wallet_deduction>0) {
            $wallet=new wallet();
            $wallet->user_id=$rhg->user_id;
            $wallet->order_id=$rhg->uniqueoid;
            $wallet->credit=0;
            $wallet->debit=$chk_wallet_deduction;
            $wallet->addedby=$rhg->user_id;
            $wallet->type='MOBILE';
            $wallet->save();
                      }
                      if($per>0)
                      {
                         
                         $cashback_amt=number_format((float)($per/100)*($rhg->amount), 2, '.', '');
                         //return $cashback_amt;
                         if ($cashback_amt>0) {
                            $chk=wallet::where('order_id',$rhg->uniqueoid)->where('credit','>',0)->where('type','MOBILE')->get();

           if(sizeof($chk)==0)
            {
            $wallet=new wallet();
            $wallet->user_id=$rhg->user_id;
            $wallet->order_id=$rhg->uniqueoid;
            $wallet->credit=$cashback_amt;
            $wallet->debit=0;
            $wallet->addedby=$rhg->user_id;
            $wallet->type='MOBILE';
            $wallet->save();
            }
                         }
                      }
                      
                }
          }
         



    }

   public function addsubscriber(Request $request)
  {
       $subscribe=new subscribe();
       $subscribe->mobile=$request->mobile;
       $subscribe->save();
       
$msg1=urlencode("You have received a new Intersest from Mobile Number # ").$request->mobile ; 
          
/*$url=file_get_contents("http://www.smsjust.com/sms/user/urlsms.php?username=dthsva&pass=Dth@1234&senderid=DTHSVA&dest_mobileno=7008031739&message=".$msg1);*/

$url=file_get_contents("http://login.questersms.com/api/mt/SendSMS?user=DTHSEVA&password=rasmi9437&senderid=DTHSVA&channel=Trans&DCS=0&flashsms=0&number=7008031739&text=".$msg1);
       
      session(['offerapply' => 'Y']);
      return back();
  }
    public function channels($bname,$bid)
    {

          $channelinfo=array();
          $category=saleschannel::select('saleschannels.*','channels.channelname','channels.channellogo','channelcategory')
          ->leftJoin('channels','saleschannels.channelid','=','channels.id')

          ->where('brand',$bid)

          ->groupBy('channels.channelcategory')
          ->get();
        
    foreach($category as $cat)
    {
        $categoryid=$cat->channelcategory;
         $catname=category::where('id',$categoryid)->pluck('categoryname')->first();


         $channels=saleschannel::select('saleschannels.*','channels.channelname','channels.channellogo','channelcategory')
          ->leftJoin('channels','saleschannels.channelid','=','channels.id')

          ->where('brand',$bid)

          ->where('channels.channelcategory',$categoryid)
          ->get();

      $channelinfo[]=['category'=>$catname,'channel'=>$channels];

      

    }
    
    return view('frontend.viewsaleschannel',compact('channelinfo'));
  }
   public function rechargecontactus(Request $request)
   {
       $rechargecontactus=new rechargeticket();
       $rechargecontactus->roid=$request->roid;
       $rechargecontactus->description=$request->description;
       $rechargecontactus->save();

      return back();

   }
   
   
   public function aboutus()
   {
       $company=company::first();

      return view('frontend.aboutus',compact('company'));

   }
   
   
   public function tnc()
   {
       $company=company::first();

      return view('frontend.tnc',compact('company'));

   }
   
   
   public function refund()
   {
       $company=company::first();

      return view('frontend.rfundpolicy',compact('company'));

   }
   public function privacy()
   {
       $company=company::first();

      return view('frontend.privacypolicy',compact('company'));

   }
   
   

    public function orderopen($pid)
    {
       $product=product::find($pid);


       return view('frontend.orderform',compact('product','pid'));
    }
    public function productdetails(Request $request,$pname,$id)
    {

       
       $product=product::find($id);

       $reviews=review::select('reviews.*','customers.name')
       ->leftJoin('customers','reviews.customerid','=','customers.id')
       ->where('productid',$id)->get();


       return view('frontend.productdetails',compact('product','reviews'));
    }
    public function home(Request $request)
    {




        $sliders=slider::all();

       $products=product::orderBy('id','desc')->take(10)->get();


        $productsshow=array();

        $productbrands=product::select('products.*','brands.brandname','products.brandid')
                            ->leftJoin('brands','products.brandid','=','brands.id')
                            ->groupBy('products.brandid')
                            ->get();
         
        foreach ($productbrands as $key => $pbrand) {

       $pbrandid=$pbrand->brandid;
      
       $pbrandname=$pbrand->brandname;
       
       $product1=product::where('brandid',$pbrandid)->get();
       
       
       $p=array('brandid'=>$pbrandid,'brandname'=>$pbrandname,'products'=>$product1);
       $productsshow[]=$p;
             
        }

        
        return view('frontend.home',compact('sliders','products','productsshow'));
    }
    public function userlogin()
    {
      return view('frontend.signup');
    }
    public function customerregister()
    {
      return view('frontend.register');
    }
    
    public function userRegister(Request $request)
    {

      if($request->password==$request->confirmpassword)
    {
       $customer=new customer();
       $this->validate($request,[
               
                'mobile'  => 'required|unique:customers|min:10',
                'email'   => 'required|unique:customers',
                'password' =>'required|min:5'
              ]);
      $customer->name=$request->name;
      $customer->email=$request->email;
      $customer->mobile=$request->mobile;
      $customer->password=$request->password;
    
      $customer->save();
       $response=array('status'=>"Y",'uid'=>$customer->id,'email'=>$customer->email,'name'=>$customer->name,'mobile'=>$customer->mobile);

        //session(['userid' =>$response]);
                  Session::put('userid', $response);
                  Session::save();
        Session::flash('emeassage','Registered Successfully');
         return back();
      }
      else
      {
            Session::flash('emeassage','Registration failed password and confirmpassword mismatch');  
             return back();
      }
    }
    public function guestchkout()
    {$uid=uniqid();
    //dd($uid);
       $response=array('status'=>"Y",'uid'=>$uid,'email'=>"",'name'=>"",'mobile'=>"");

        //session(['userid' =>$response]);
         Session::put('userid', $response);
         Session::save();
         return back();
        
    }
      
    public function viewpackagesbybrand($bname,$bid)
    {
         $packages=package::where('brand','=',$bid)->paginate(12);
         return view('frontend.viewpackagesbybrand',compact('packages'));
    }
    public function viewproductsbybrand($bname,$bid,Request $request)
    {

       if($request->has('price'))
       {
         $products=product::where('brandid',$bid)->orderBy('promocost',$request->price);
       }
       elseif ($request->has('name')) {
        $products=product::where('brandid',$bid)->orderBy('name',$request->name);
       }
       else
       {
          $products=product::where('brandid',$bid);
       }
         
        $products=$products->paginate(12)->appends([

          "price"=>$request->price,
          "name"=>$request->name

         ]);
   

      return view('frontend.viewproductsbybrand',compact('products'));
    }

    public function loginuser(Request $request)
    { 

        $current_time = Carbon::now();
        
        if($request->otp!='')
        {
           $time=otp::where('mobile',$request->mobile)->where('otp',$request->otp)->orderBy('id','DESC')->pluck('created_at')->first();
           if($time=='')
           {
            Session::flash('meassage','Invalid Otp');
            return back();
           }
           else
           {
            $totalDuration = $current_time->diffInSeconds($time);
            if($totalDuration<901)
               {
              $userdetails=customer::where('mobile',$request->mobile)->first();
               $response=array('status'=>"Y",'uid'=>$userdetails->id,'email'=>$userdetails->email,'name'=>$userdetails->name,'mobile'=>$userdetails->mobile);
                  //session(['userid' =>$response]);
                  Session::put('userid', $response);
                  Session::save();
                  return back();
              }
              else
              {
                Session::flash('meassage',' Otp Expired');
                 return back();
              }
           }
        }
        else
        {
           
            $userdetails=customer::where('mobile',$request->mobile)->where('password',$request->password)->first();
            if($userdetails)
            {
              $userdetails=customer::where('mobile',$request->mobile)->first();
               $response=array('status'=>"Y",'uid'=>$userdetails->id,'email'=>$userdetails->email,'name'=>$userdetails->name,'mobile'=>$userdetails->mobile);
                  //session(['userid' =>$response]);
                  Session::put('userid', $response);
                  Session::save();
                  return back();

            }
            else
            {
              Session::flash('meassage','Mobile No. or Password Incorrect');
                 return back();
            }
        }
    }
   
      public function userLogout()
    {
      session()->flush();
      return redirect('/');
    }

   public function placeOrder(Request $request,$pid)
   {
       //return $request;

         $couponcode=coupon::where('couponname',$request->couponcode)->first();
        
         if($couponcode)
         {
              $coupncod=$request->couponcode;
              $coupamt= $couponcode->amount;
         }
         else
         {
             $coupncod="";
              $coupamt=0;
         }

         if ($request->has('walletbal') && $request->get('walletbal')>0) {
               $cashback_deduct=$request->get('walletbal');
         }
         else
         {
              $cashback_deduct=0;
         }
         $order=new order();
         $order->productid=$request->productid;
         $pro=product::find($request->productid);
         $productprice=$pro->promocost;
         $bookingamount=$pro->bookingamount;
         $installamt=$pro->installamt;
         $order->userid=Session::get('userid')['uid'];

         $order->paymentmode=$request->pmode;
         $order->wallet_deduction=$cashback_deduct;

         $order->mobile=$request->mobile;
         $order->email=$request->email;
         $order->name=$request->name;
         $order->altmobile=$request->altmobile;
         $order->couponcode=$coupncod;
         $order->discount=$coupamt;


         $order->orderstatus= "ORDERED";
          

         if($request->pmode=="FULLAMOUNT"){

           $order->paymentstatus= "PENDING";
           $order->productprice=$productprice+$installamt;

           $order->amountpaid="0";

         }
         else
         {
             $order->paymentstatus= "PENDING";
             $order->productprice=$productprice+$installamt;
            $order->amountpaid="0";
         }
         
         $order->save();

         $orderid=$order->id;
         $orderaddress=new orderaddress();
         $orderaddress->orderid=$orderid;
         $orderaddress->address=$request->address;
         
         $orderaddress->pincode=$request->pincode;
         $orderaddress->city=$request->city;
         $orderaddress->state=$request->state;

         $orderaddress->save();

$oid=base64_encode($orderid);
      
           return redirect('/paymentgateway/'.$oid);
         
   }

  public function searchresult($pname,$pid)
  {
     
    return redirect('/products/'.$pname.'/'.$pid);
  }

    public function pgrouting($oid)
  {
        
  $orderid=base64_decode($oid);
  $orderdet=order::where('id',$orderid)->first();
  $product=product::find($orderdet->productid);
  //dd($orderdet);
  if($orderdet->paymentmode=="FULLAMOUNT")
  {
    $price=(($product->promocost+$product->installamt)-($orderdet->discount))-$orderdet->wallet_deduction;
    //dd($price,$product);
  }
  else
  {
    $price=$product->bookingamount;
  }
  $cid=$orderdet->userid;
  $custdet=customer::find($cid);
   // dd($orderdet);
   $api = new Instamojo("9d7269783e6712e87a57009ff9512023", "09f7e994447bdae99abc2e645d4c0b5a",'https://www.instamojo.com/api/1.1/');
    //$api = new Instamojo("test_ec3040a9f569014179d70bbb2f5", "test_79dfe4f06fb7fb6bbd354a77c04",'https://test.instamojo.com/api/1.1/');

    $response = $api->paymentRequestCreate(array(
        "purpose" => "DTHSEVA #".$orderdet->id,
        "amount" => $price,
        "send_email" => false,
        "email" =>$orderdet->email,
        "mobile"=>$orderdet->mobile,
        "redirect_url" => "https://dthseva.com/responsedata"
        ));
//dd( $response);
  
  
  return redirect( $response['longurl']);
  }
  public function responsedata()
  {
      
   $api = new Instamojo("9d7269783e6712e87a57009ff9512023", "09f7e994447bdae99abc2e645d4c0b5a",'https://www.instamojo.com/api/1.1/');
   //$api = new Instamojo("test_ec3040a9f569014179d70bbb2f5", "test_79dfe4f06fb7fb6bbd354a77c04",'https://test.instamojo.com/api/1.1/');
  
        try {
            $pid=Input::get('payment_id');
            $prid=Input::get('payment_request_id');
            
            
            $response = $api->paymentRequestStatus($prid);
            
            
   // print_r($response);
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
        
if(isset($response))
{


   
    if($response['status']=="Completed")
    {
        $oid= str_replace('DTHSEVA #', "", $response['purpose']);
        $order=order::find($oid);
        $product=product::find($order->productid);
        $order->amountpaid=round($response['amount']);
        $order->paymentstatus="PAID";
        $order->save();

        if($order->wallet_deduction>0)
        {
             $chk=wallet::where('order_id',$order->id)->where('debit','>',0)->get();
             if(sizeof($chk)==0)
             {
            $wallet=new wallet();
            $wallet->user_id=$order->userid;
            $wallet->order_id=$order->id;
            $wallet->credit=0;
            $wallet->debit=$order->wallet_deduction;
            $wallet->addedby=$order->userid;
            $wallet->save();
             }
        
        }
          if($product->cashback_by_type=='PERCENTAGE')
           {
            $cashback_amt=number_format((float)($product->cashback_value/100)*($product->promocost-$order->discount), 2, '.', '');
           }
          elseif($product->cashback_by_type=='FLAT')
            {
             $cashback_amt=number_format((float)$product->cashback_value, 2, '.', '');  
            }
            else
            {
              $cashback_amt=0;
            }


          if ($cashback_amt!=0) {

            $chk=wallet::where('order_id',$order->id)->where('credit','>',0)->get();

        if(sizeof($chk)==0)
            {
            $wallet=new wallet();
            $wallet->user_id=$order->userid;
            $wallet->order_id=$order->id;
            $wallet->credit=$cashback_amt;
            $wallet->debit=0;
            $wallet->addedby=$order->userid;
            $wallet->save();
            }
            
             
             
            

              
          }


        
          try{
            $msg=urlencode("Thank you For ordering with DTHSEVA Your Order Id - ".$response['purpose'].". Product Details:".$product->name); 
            $msg1=urlencode("You have received a new order# Id - ".$response['purpose'].". Product Details:".$product->name); 
          
/*$url=file_get_contents("http://www.smsjust.com/sms/user/urlsms.php?username=dthsva&pass=Dth@1234&senderid=DTHSVA&dest_mobileno=".$order->mobile."&message=".$msg);
$url=file_get_contents("http://www.smsjust.com/sms/user/urlsms.php?username=dthsva&pass=Dth@1234&senderid=DTHSVA&dest_mobileno=7008031739&message=".$msg1);*/

$url=file_get_contents("http://login.questersms.com/api/mt/SendSMS?user=DTHSEVA&password=rasmi9437&senderid=DTHSVA&channel=Trans&DCS=0&flashsms=0&number=".$order->mobile."&text=".$msg);
$url=file_get_contents("http://login.questersms.com/api/mt/SendSMS?user=DTHSEVA&password=rasmi9437&senderid=DTHSVA&channel=Trans&DCS=0&flashsms=0&number=7008031739&text=".$msg1);

}
catch(Exception $e){
     print('Error: ' . $e->getMessage());
}
         

        return redirect('/myaccount/myproductorders');
        
        
     //   dd($response);
        //$order
    }
}
  }

  public function dthRechargeFromWallet($oid)
  {
  $od=rechargeorder::select('rechargeorders.*','brands.recharge_code')
             ->leftJoin('brands','rechargeorders.brandid','=','brands.id')
             ->where('rechargeorders.uniqueoid',$oid)
             ->first();
        $userid=env('RECHARGE_API_USERID','');
        $password=env('RECHARGE_API_PASSWORD','');
        $mobno=env('RECHARGE_API_MOBILE_NO','');
        $smspin=env('RECHARGE_API_SMSPIN','');
        $provider=$od->recharge_code;
        $customerno=$od->cardno;
        $amt=$od->amount;
        $trnid='OID'.$oid.'DTHCUSTID'.$od->user_id;
        $custmsg=$provider.'$'.$customerno.'$'.$amt.'$'.$smspin.'$0$'.$trnid;
        $odrid=$oid;


        $rechargeurl='http://onepayexpress.com/OpayeAdmin/RechargeAPI.aspx?UserID='.$userid.'&PASSWORD='. $password.'&MobileNo='.$mobno.'&Message='.$custmsg;

        //return $rechargeurl;

         $client = new \GuzzleHttp\Client();
         $response = $client->request('GET',$rechargeurl);
         $sta=$response->getBody();
         $arr=explode("=",$sta);

         $od1=rechargeorder::where('uniqueoid',$odrid)->first();
         $od1->api_url=$rechargeurl;
           if($arr[0]=='0')
         {
            $od1->orderstatus='PENDING';
         }
         else
         {
             $od1->orderstatus='FAILED';
         }
         $od1->recharge_res_msg=$sta;
         $od1->trnid=$trnid;
         $od1->save();

         return redirect('/myaccount/mydthrecharges');
  
  }
  public function mobRechargeFromWallet($oid)
  {
      
      $od=Mobilerechargeorder::select('mobilerechargeorders.*','mobileoperators.recharge_code','mobileoperators.postpaid_recharge_code')
             ->leftJoin('mobileoperators','mobilerechargeorders.brandid','=','mobileoperators.id')
             ->where('mobilerechargeorders.uniqueoid',$oid)
             ->first();

       $userid=env('RECHARGE_API_USERID','');
        $password=env('RECHARGE_API_PASSWORD','');
        $mobno=env('RECHARGE_API_MOBILE_NO','');
        $smspin=env('RECHARGE_API_SMSPIN','');
        if ($od->recharge_type=='PREPAID') {
            $provider=$od->recharge_code;
        }
        else
        {
            $provider=$od->postpaid_recharge_code;
        }
        
        $customerno=$od->mobileno;
        $amt=$od->amount;
        $trnid='OID'.$oid.'MOBCUSTID'.$od->user_id;
        $custmsg=$provider.'$'.$customerno.'$'.$amt.'$'.$smspin.'$0$'.$trnid;

        $odrid=$oid;


        $rechargeurl='http://onepayexpress.com/OpayeAdmin/RechargeAPI.aspx?UserID='.$userid.'&PASSWORD='. $password.'&MobileNo='.$mobno.'&Message='.$custmsg;
       //return $rechargeurl;

         $client = new \GuzzleHttp\Client();
         $response = $client->request('GET',$rechargeurl);
         $sta=$response->getBody();
         $arr=explode("=",$sta);

         $od1=Mobilerechargeorder::where('uniqueoid',$odrid)->first();
         $od1->api_url=$rechargeurl;
         $od1->recharge_res_msg=$sta;
         $od1->trnid=$trnid;
         if($arr[0]=='0')
         {
            $od1->orderstatus='PENDING';
         }
         else
         {
             $od1->orderstatus='FAILED';
         }
         $od1->save();

         return redirect('/myaccount/mymobilerecharges');
    
  }

  public function pgroutingrecharge($oid)
  {
        
  $orderid=base64_decode($oid);
  $orderdet=rechargeorder::where('uniqueoid',$orderid)->first();
  $cid=$orderdet->user_id;
  $custdet=customer::find($cid);

   if($orderdet->use_wallet='Y' && $orderdet->amttopay==0)
   {

          return $this->dthRechargeFromWallet($orderid);

   }
   else
   {



/*$api = new Instamojo("9d7269783e6712e87a57009ff9512023", "09f7e994447bdae99abc2e645d4c0b5a",'https://www.instamojo.com/api/1.1/');
//$api = new Instamojo("test_ec3040a9f569014179d70bbb2f5", "test_79dfe4f06fb7fb6bbd354a77c04",'https://test.instamojo.com/api/1.1/');
    $response = $api->paymentRequestCreate(array(
        "purpose" => "DTHSEVARECHARGE #".$orderdet->id,
        "amount" => $orderdet->amount,
        "send_email" => false,
        "email" =>$custdet->email,
        "mobile"=>$custdet->mobile,
        "redirect_url" => "http://localhost:8000/rechargeresponsedata"
        ));*/
    $payment = PaytmWallet::with('receive');
    $payment->prepare([
          'order' =>$orderid, // your order id taken from cart
          'user' => 'customer_id_'.$cid, // your user id
          'mobile_number' =>$custdet->mobile, // your customer mobile no
          'email' => $custdet->email, // your user email address
          'amount' => $orderdet->amttopay, // amount will be paid in INR.
          'callback_url' => env('PAYTM_CALLBACK_URL') // callback URL
        ]);

      //dd($payment);
        
        return $payment->receive();
  //return redirect( $response['longurl']);
      }
  }  

  public function pgroutingmobilerecharge($oid)
  {
        
  $orderid=base64_decode($oid);
   $orderdet=Mobilerechargeorder::where('uniqueoid',$orderid)->first();
   $cid=$orderdet->user_id;
   $custdet=customer::find($cid);
     if($orderdet->use_wallet='Y' && $orderdet->amttopay==0)
   {
           return $this->mobRechargeFromWallet($orderid);
   }
   else
   {


  

   $payment = PaytmWallet::with('receive');
    $payment->prepare([
          'order' =>$orderid, // your order id taken from cart
          'user' => 'customer_id_'.$cid.'-'.time(), // your user id
          'mobile_number' =>$custdet->mobile, // your customer mobile no
          'email' => $custdet->email, // your user email address
          'amount' => $orderdet->amttopay, // amount will be paid in INR.
          'callback_url' => env('PAYTM_CALLBACK_URL_MOBILE') // callback URL
        ]);

      
        
        return $payment->receive();
      }
  //return redirect( $response['longurl']);
  }



  public function paymentCallback()
  {
         $transaction = PaytmWallet::with('receive');
         $response = $transaction->response();

         if($transaction->isSuccessful()){
        $chk=paytmrecharge::where('orderid',$response['ORDERID'])
             ->where('banktxnid',$response['BANKTXNID'])
             ->count();
        if($chk==0)
        {


        
        $order=rechargeorder::where('uniqueoid',$response['ORDERID'])->first();
        $order->paymentstatus="PAID";
        $order->save();

        $od=rechargeorder::select('rechargeorders.*','brands.recharge_code')
             ->leftJoin('brands','rechargeorders.brandid','=','brands.id')
             ->where('rechargeorders.uniqueoid',$response['ORDERID'])
             ->first();



        $paytmrecharge=new paytmrecharge();
        $paytmrecharge->orderid=$response['ORDERID'];
        $paytmrecharge->mid=$response['MID'];
        $paytmrecharge->txnid=$response['TXNID'];
        $paytmrecharge->txnamount=$response['TXNAMOUNT'];
        $paytmrecharge->paymentmode=$response['PAYMENTMODE'];
        $paytmrecharge->currency=$response['CURRENCY'];
        $paytmrecharge->txndate=$response['TXNDATE'];
        $paytmrecharge->status=$response['STATUS'];
        $paytmrecharge->respcode=$response['RESPCODE'];
        $paytmrecharge->respmsg=$response['RESPMSG'];
        $paytmrecharge->gateayname=$response['GATEWAYNAME'];
        $paytmrecharge->banktxnid=$response['BANKTXNID'];
        $paytmrecharge->checksumhash=$response['CHECKSUMHASH'];
        $paytmrecharge->SAVE();

 

        
        $userid=env('RECHARGE_API_USERID','');
        $password=env('RECHARGE_API_PASSWORD','');
        $mobno=env('RECHARGE_API_MOBILE_NO','');
        $smspin=env('RECHARGE_API_SMSPIN','');
        $provider=$od->recharge_code;
        $customerno=$od->cardno;
        $amt=$od->amount;
        $trnid='OID'.$response['ORDERID'].'DTHCUSTID'.$od->user_id;
        $custmsg=$provider.'$'.$customerno.'$'.$amt.'$'.$smspin.'$0$'.$trnid;
        $odrid=$response['ORDERID'];


        $rechargeurl='http://onepayexpress.com/OpayeAdmin/RechargeAPI.aspx?UserID='.$userid.'&PASSWORD='. $password.'&MobileNo='.$mobno.'&Message='.$custmsg;

         $client = new \GuzzleHttp\Client();
         $response = $client->request('GET',$rechargeurl);
         $sta=$response->getBody();
         $arr=explode("=",$sta);

         $od1=rechargeorder::where('uniqueoid',$odrid)->first();
         $od1->api_url=$rechargeurl;
           if($arr[0]=='0')
         {
            $od1->orderstatus='PENDING';
         }
         else
         {
             $od1->orderstatus='FAILED';
         }
         $od1->recharge_res_msg=$sta;
         $od1->trnid=$trnid;
         $od1->save();


/* try{
  $msg1=urlencode("You have received a new recharge order# Id - ".$odrid."."); 
$url=file_get_contents("http://login.questersms.com/api/mt/SendSMS?user=DTHSEVA&password=rasmi9437&senderid=DTHSVA&channel=Trans&DCS=0&flashsms=0&number=7008031739&text=".$msg1);
     }
catch(Exception $e){
     print('Error: ' . $e->getMessage());
}*/     }
        
        
        }
        else if($transaction->isFailed()){

        $order=rechargeorder::where('uniqueoid',$response['ORDERID'])->first();
        $order->paymentstatus="FAILED";
        $order->orderstatus="FAILED";
        $order->save();

        $paytmrecharge=new paytmrecharge();
        $paytmrecharge->orderid=$response['ORDERID'];
        $paytmrecharge->mid=$response['MID'];
     
        $paytmrecharge->txnamount=$response['TXNAMOUNT'];
        $paytmrecharge->currency=$response['CURRENCY'];
        $paytmrecharge->status=$response['STATUS'];
        $paytmrecharge->respcode=$response['RESPCODE'];
        $paytmrecharge->respmsg=$response['RESPMSG'];
        $paytmrecharge->banktxnid=$response['BANKTXNID'];
        $paytmrecharge->checksumhash=$response['CHECKSUMHASH'];
        $paytmrecharge->SAVE();

        $order=rechargeorder::where('uniqueoid',$response['ORDERID'])->first();
        $order->paymentstatus="FAILED";
        $order->save();

         return redirect('/myaccount/mydthrecharges');
            
        }


    return redirect('/myaccount/mydthrecharges');
  }public function paymentCallbackMobile()
  {
         $transaction = PaytmWallet::with('receive');
         $response = $transaction->response();
         if($transaction->isSuccessful()){
           $chk=paytmrecharge::where('orderid',$response['ORDERID'])
             ->where('banktxnid',$response['BANKTXNID'])
             ->count();

        if($chk==0)
       {

        $order=Mobilerechargeorder::where('uniqueoid',$response['ORDERID'])->first();
        $order->paymentstatus="PAID";
        $order->save();

        $od=Mobilerechargeorder::select('mobilerechargeorders.*','mobileoperators.recharge_code','mobileoperators.postpaid_recharge_code')
             ->leftJoin('mobileoperators','mobilerechargeorders.brandid','=','mobileoperators.id')
             ->where('mobilerechargeorders.uniqueoid',$response['ORDERID'])
             ->first();


        $paytmrecharge=new paytmrecharge();
        $paytmrecharge->orderid=$response['ORDERID'];
        $paytmrecharge->mid=$response['MID'];
        $paytmrecharge->txnid=$response['TXNID'];
        $paytmrecharge->txnamount=$response['TXNAMOUNT'];
        $paytmrecharge->paymentmode=$response['PAYMENTMODE'];
        $paytmrecharge->currency=$response['CURRENCY'];
        $paytmrecharge->txndate=$response['TXNDATE'];
        $paytmrecharge->status=$response['STATUS'];
        $paytmrecharge->respcode=$response['RESPCODE'];
        $paytmrecharge->respmsg=$response['RESPMSG'];
        $paytmrecharge->gateayname=$response['GATEWAYNAME'];
        $paytmrecharge->banktxnid=$response['BANKTXNID'];
        $paytmrecharge->checksumhash=$response['CHECKSUMHASH'];
        $paytmrecharge->type='MOBILE';
        $paytmrecharge->SAVE();

 

        
        $userid=env('RECHARGE_API_USERID','');
        $password=env('RECHARGE_API_PASSWORD','');
        $mobno=env('RECHARGE_API_MOBILE_NO','');
        $smspin=env('RECHARGE_API_SMSPIN','');
        if ($od->recharge_type=='PREPAID') {
            $provider=$od->recharge_code;
        }
        else
        {
            $provider=$od->postpaid_recharge_code;
        }
        $customerno=$od->mobileno;
        $amt=$od->amount;
        $trnid='OID'.$response['ORDERID'].'MOBCUSTID'.$od->user_id;
        $custmsg=$provider.'$'.$customerno.'$'.$amt.'$'.$smspin.'$0$'.$trnid;

        $odrid=$response['ORDERID'];


        $rechargeurl='http://onepayexpress.com/OpayeAdmin/RechargeAPI.aspx?UserID='.$userid.'&PASSWORD='. $password.'&MobileNo='.$mobno.'&Message='.$custmsg;
       //return $rechargeurl;
         $client = new \GuzzleHttp\Client();
         $response = $client->request('GET',$rechargeurl);
         $sta=$response->getBody();
         $arr=explode("=",$sta);

         $od1=Mobilerechargeorder::where('uniqueoid',$odrid)->first();
         $od1->api_url=$rechargeurl;
         $od1->recharge_res_msg=$sta;
         $od1->trnid=$trnid;
         if($arr[0]=='0')
         {
            $od1->orderstatus='PENDING';
         }
         else
         {
             $od1->orderstatus='FAILED';
         }
         $od1->save();

           }

         
        
        }
        else if($transaction->isFailed()){

        $order=Mobilerechargeorder::where('uniqueoid',$response['ORDERID'])->first();
        $order->paymentstatus="FAILED";
        $order->orderstatus="FAILED";
        $order->save();

        $paytmrecharge=new paytmrecharge();
        $paytmrecharge->orderid=$response['ORDERID'];
        $paytmrecharge->mid=$response['MID'];
     
        $paytmrecharge->txnamount=$response['TXNAMOUNT'];
        $paytmrecharge->currency=$response['CURRENCY'];
        $paytmrecharge->status=$response['STATUS'];
        $paytmrecharge->respcode=$response['RESPCODE'];
        $paytmrecharge->respmsg=$response['RESPMSG'];
        $paytmrecharge->banktxnid=$response['BANKTXNID'];
        $paytmrecharge->checksumhash=$response['CHECKSUMHASH'];
        $paytmrecharge->type='MOBILE';
        $paytmrecharge->SAVE();

        $order=rechargeorder::where('uniqueoid',$response['ORDERID'])->first();
        $order->paymentstatus="FAILED";
        $order->save();

         return redirect('/myaccount/mymobilerecharges');
            
        }


    return redirect('/myaccount/mymobilerecharges');
  }
  
public function rechargeresponsedata()
  {
    


   $api = new Instamojo("9d7269783e6712e87a57009ff9512023", "09f7e994447bdae99abc2e645d4c0b5a",'https://www.instamojo.com/api/1.1/');
   //$api = new Instamojo("test_ec3040a9f569014179d70bbb2f5", "test_79dfe4f06fb7fb6bbd354a77c04",'https://test.instamojo.com/api/1.1/');
        try {
            $pid=Input::get('payment_id');
            $prid=Input::get('payment_request_id');
            $response = $api->paymentRequestStatus($prid);
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}
        
if(isset($response))
{
    if($response['status']=="Completed")
    {
        $oid= str_replace('DTHSEVARECHARGE #', "", $response['purpose']);
        $order=rechargeorder::find($oid);
        $order->paymentstatus="PAID";
       
        $order->save();

       /* $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://www.onepayexpress.com/OpayeAdmin/RechargeAPI.aspx?UserID= 7008031739&Password=256325&MobileNo=7008031739&Message=BAL$9252');

        return $response->getBody();*/

        
  try{
            $msg1=urlencode("You have received a new recharge order# Id - ".$oid."."); 


          
//$url=file_get_contents("http://www.smsjust.com/sms/user/urlsms.php?username=dthsva&pass=Dth@1234&senderid=DTHSVA&dest_mobileno=7008031739&message=".$msg1);

$url=file_get_contents("http://login.questersms.com/api/mt/SendSMS?user=DTHSEVA&password=rasmi9437&senderid=DTHSVA&channel=Trans&DCS=0&flashsms=0&number=7008031739&text=".$msg1);

}
catch(Exception $e){
     print('Error: ' . $e->getMessage());
}
        
        return redirect('/myaccount');
        
        
     //   dd($response);
        //$order
    }
}
  }

   
  public function viewpackagedetails($pname,$pid)
  {
    $pack=array();
    $packagename=package::select('packages.*','brands.brandname')

    ->leftJoin('brands','packages.brand','=','brands.id')
    ->first();


    $packagecategory=packagechannel::select('channels.channelcategory')
    ->where('packageid',$pid)
    ->leftJoin('channels','packagechannels.channelid','=','channels.id')
    ->groupBy('channels.channelcategory')
    ->get();

    $allchannels=packagechannel::select('channels.*')
    ->where('packageid',$pid)
   
    ->leftJoin('channels','packagechannels.channelid','=','channels.id')
    ->get();

    foreach ($packagecategory as $key => $pc) {
          $category=$pc->channelcategory;
    $catname=category::where('id',$category)->pluck('categoryname')->first();
    $packagechannels=packagechannel::select('channels.*')
    ->where('packageid',$pid)
    ->where('channels.channelcategory',$category)
    ->leftJoin('channels','packagechannels.channelid','=','channels.id')
    ->get();


    $pack[]= ['category'=>$catname,'channel'=>$packagechannels] ;
    }




    return view('frontend.viewpackagedetails',compact('packagename','pack','allchannels'));
  }
  public function allchannelinfo()
  {
    $channelinfo=array();
    $category=channel::groupBy('channelcategory')->get();

    foreach($category as $cat)
    {
        $categoryid=$cat->channelcategory;
         $catname=category::where('id',$categoryid)->pluck('categoryname')->first();

         $channels=channel::where('channelcategory',$categoryid)
         ->get();

      $channelinfo[]=['category'=>$catname,'channel'=>$channels];

    }


  
    return view('frontend.allchannelinfo',compact('channelinfo'));
  }
  public function recharge()
  {
    

    $brands=brand::all();
    return view('frontend.recharge',compact('brands'));
  }

  public function mymobilerecharges()
  {
  $uid=Session::get('userid')['uid'];
   if($uid!='')
   {
       
      $mobilerechrgeorders=Mobilerechargeorder::select('mobilerechargeorders.*','customers.name','mobileoperators.operatorname','mobileoperators.brandlogo')
      ->leftJoin('customers','mobilerechargeorders.user_id','=','customers.id')
      ->leftJoin('mobileoperators','mobilerechargeorders.brandid','mobileoperators.id')
            ->where('mobilerechargeorders.user_id',$uid)
      
      ->orderBy('mobilerechargeorders.id','desc')
      ->paginate(5);
     
      $wallet=wallet::where('user_id',$uid)->get();
      $walletbal=$wallet->sum('credit')-$wallet->sum('debit');

    return view('frontend.mymobilerecharges',compact('mobilerechrgeorders','walletbal')); 
       
   }
  else
   {
       return redirect('/userlogin');
   }
 }
 public function myprofile()
 {
   $uid=Session::get('userid')['uid'];
   if($uid!='')
   {
    $wallet=wallet::where('user_id',$uid)->get();
      $walletbal=$wallet->sum('credit')-$wallet->sum('debit');

    return view('frontend.myprofile',compact('walletbal')); 
       
   }
  else
   {
       return redirect('/userlogin');
   }
 }
 public function mywallet()
 {
   $uid=Session::get('userid')['uid'];
   if($uid!='')
   {
      $wallets=wallet::where('user_id',$uid)->orderBy('created_at','DESC')->get();
      $wallet=wallet::where('user_id',$uid)->get();
      $walletbal=$wallet->sum('credit')-$wallet->sum('debit');

    return view('frontend.mywallet',compact('wallets','walletbal')); 
       
   }
  else
   {
       return redirect('/userlogin');
   }
 }

 public function mydthrecharges()
  {
  $uid=Session::get('userid')['uid'];
   if($uid!='')
   {
          $rechrgeorders=rechargeorder::select('rechargeorders.*','customers.name','brands.brandname','brands.brandlogo')
      ->leftJoin('customers','rechargeorders.user_id','=','customers.id')
      ->leftJoin('brands','rechargeorders.brandid','brands.id')
            ->where('rechargeorders.user_id',$uid)
      
      ->orderBy('rechargeorders.id','desc')
      ->paginate(5);
      
     
      $wallet=wallet::where('user_id',$uid)->get();
      $walletbal=$wallet->sum('credit')-$wallet->sum('debit');

    return view('frontend.mydthrecharges',compact('rechrgeorders','walletbal')); 
       
   }
  else
   {
       return redirect('/userlogin');
   }
 }

  public function myproductorders()
  {
       $uid=Session::get('userid')['uid'];
   if($uid!='')
   {
       
  
      $orders=order::select('orders.*','orderaddresses.address','orderaddresses.pincode','orderaddresses.city','orderaddresses.state','products.name as productname','products.image1')
      ->where('orders.userid',$uid)
      ->leftJoin('orderaddresses','orders.id','=','orderaddresses.orderid')
      ->leftJoin('products','orders.productid','=','products.id')
      ->groupBy('orders.id')
      ->orderBy('orders.id','desc')
      ->get();
      $wallet=wallet::where('user_id',$uid)->get();
      $walletbal=$wallet->sum('credit')-$wallet->sum('debit');

    return view('frontend.myproductorders',compact('orders','walletbal')); 
       
   }
   else
   {
       return redirect('/userlogin');
   }
  }
  public function myaccount()
  {
   $uid=Session::get('userid')['uid'];
   if($uid!='')
   {
       
  
      $orders=order::select('orders.*','orderaddresses.address','orderaddresses.pincode','orderaddresses.city','orderaddresses.state','products.name as productname','products.image1')
      ->where('orders.userid',$uid)
      ->leftJoin('orderaddresses','orders.id','=','orderaddresses.orderid')
      ->leftJoin('products','orders.productid','=','products.id')
      ->groupBy('orders.id')
      ->orderBy('orders.id','desc')
      ->get();

    

      $rechrgeorders=rechargeorder::select('rechargeorders.*','customers.name','brands.brandname','brands.brandlogo')
      ->leftJoin('customers','rechargeorders.user_id','=','customers.id')
      ->leftJoin('brands','rechargeorders.brandid','brands.id')
            ->where('rechargeorders.user_id',$uid)
      
      ->orderBy('rechargeorders.id','desc')
      ->get();

      $mobilerechrgeorders=Mobilerechargeorder::select('mobilerechargeorders.*','customers.name','mobileoperators.operatorname','mobileoperators.brandlogo')
      ->leftJoin('customers','mobilerechargeorders.user_id','=','customers.id')
      ->leftJoin('mobileoperators','mobilerechargeorders.brandid','mobileoperators.id')
            ->where('mobilerechargeorders.user_id',$uid)
      
      ->orderBy('mobilerechargeorders.id','desc')
      ->get();
   
      $wallet=wallet::where('user_id',$uid)->get();
      $walletbal=$wallet->sum('credit')-$wallet->sum('debit');
    return view('frontend.myaccount',compact('orders','rechrgeorders','walletbal','mobilerechrgeorders')); 
       
   }
   else
   {
       return redirect('/userlogin');
   }
  }
  public function cancelOrder(Request $request)
  {

    $order=order::find($request->orderid);
    $order->orderstatus="CANCELLED";

    $order->save();

    $cancelorder=new cancelorder();

    $cancelorder->orderid=$request->orderid;
    $cancelorder->productid=$request->productid;
    $cancelorder->userid=Session::get('userid')['uid'];

    $cancelorder->reason=$request->reason;
    $cancelorder->description=$request->description;

    $cancelorder->save();

    return back();


  }
  public function addReview(Request $request)
  {
        $review = new review();
    
        $review->customerid =Session::get('userid')['uid'];
        $review->productid  = $request['productid'];
        $review->orderid  = $request['orderid'];
        $review->price = $request['price'];
        $review->value = $request['value'];
        $review->quality = $request['quality'];
        $review->review = $request['review'];

        Session::flash('thankmsg','Thank You For Your Review');
        $review->save();

      return back();
  }
  public function updateprofile(Request $request,$id)
  {
     $customer=customer::find($id);
     $customer->name=$request->name;
     $customer->email=$request->email;
     $customer->save();
     $userdetails=customer::where('id',$id)->first();
               $response=array('status'=>"Y",'uid'=>$userdetails->id,'email'=>$userdetails->email,'name'=>$userdetails->name,'mobile'=>$userdetails->mobile);
                  //session(['userid' =>$response]);
                  Session::put('userid', $response);
                  Session::save();

     return back();

  }

  
  public function rechargeorder(Request $request)
  {


     $recharge=new recharge();
     $recharge->customerid=Session::get('userid')['uid'];
     $recharge->brand=$request->brand;
     $recharge->rmn=$request->mobile;
     $recharge->vcno=$request->cardno;
     $recharge->amt=$request->amt;
     $recharge->paystatus="PENDING";
     $recharge->rechargestatus="PENDING";
     $recharge->save();
     
     return response()->json("Recharge Done");

  }
  
}
