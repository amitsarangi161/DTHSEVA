<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;
use App\brand;
use App\Mobileoperator;
use URL;
use Validator;
use App\customer;
use Carbon\Carbon;
use App\otp;
use App\wallet;
use DB;
use App\Mobilerechargeorder;
use App\rechargeorder;
use App\walletorder;
use App\product;
use App\review;
use App\rechargeticket;

class ApiController extends Controller
{

  private $apiToken;
  public function __construct()
  {
    // Unique Token
    $this->apiToken = uniqid(base64_encode(str_random(60)));
    
  }

    public function validateUser($token)
    {
    	$user = customer::where('api_token',$token)->first();
    	if($user){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    public function userAllTickets(Request $request,$userid)
    {
         $token = $request->header('Authorization');
          if ($this->validateUser($token)) {
        $tickets=rechargeticket::where('user_id',$userid)->paginate(10);
        return response()->json(['status'=>'Y','data'=>$tickets,'message'=>'Data Fetched Successfully']);
      }
      else{
         return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
      }
    }

    public function createRechargeTicket(Request $request)
    {
      $token = $request->header('Authorization');
          if ($this->validateUser($token)) {
       $rechargecontactus=new rechargeticket();
       $rechargecontactus->roid=$request->uniqueoid;
       $rechargecontactus->user_id=$request->userid;
       $rechargecontactus->type=$request->type;
       $rechargecontactus->description=$request->description;
       $rechargecontactus->save();

      return response()->json(['status'=>'Y','message'=>'Ticket Created Successfully']);
         }
         else
         {
            return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
         }
     }



    public function viewSingleProduct($pid)
    {
        $product=product::select('products.*','brands.brandname')
          ->leftJoin('brands','products.brandid','=','brands.id')
          ->where('products.id',$pid)
          ->first();
          //return $product;
        if ($product) {
         $r=DB::table('rating')->where('productid',$pid)->pluck('rating')->first();

        $res=array('id'=>$product->id,'productname'=>$product->name,'cost'=>$product->cost,'bookingamount'=>$product->bookingamount,'installamt'=>$product->installamt,'longdescription'=>$product->longdescription,'shortdescription'=>$product->shortdescription,'promocost'=>$product->promocost,'brand'=>$product->brandname,'image1'=>URL::to('/').'/img/productimage/'.$product->image1,'image2'=>URL::to('/').'/img/productimage/'.$product->image2,'image3'=>URL::to('/').'/img/productimage/'.$product->image3,'image4'=>URL::to('/').'/img/productimage/'.$product->image4,'rating'=>number_format((float)$r, 1, '.', ''));

        $reviews=review::select('reviews.*','customers.name')
       ->leftJoin('customers','reviews.customerid','=','customers.id')
       ->where('productid',$pid)->get();

       $response=array('product'=>$res,'reviews'=>$reviews);

        return response()->json(['status'=>'Y','data'=>$response,'message'=>'Data Fetched Successfully']);
        }
        else{
          return response()->json(['status'=>'N','data'=>'','No data Found']);
        }
           
    }

    public function rechargeDetails(Request $request,$uniqueoid)
    {
          $token = $request->header('Authorization');
          if ($this->validateUser($token)) {
             if ($request->type=='MOB') {
                $response=mobilerechargeorder::select('uniqueoid','mobileoperators.operatorname as brandname','mobileno','amount','orderstatus','paymentstatus','trnid','wallet_deduction','use_wallet','amttopay','circle','recharge_type','mobilerechargeorders.created_at')
                      ->where('uniqueoid',$uniqueoid)
                      ->leftJoin('mobileoperators','mobilerechargeorders.brandid','=','mobileoperators.operatorname')
                      ->first();
             }
             elseif ($request->type=='DTH') {
                  $response=rechargeorder::select('uniqueoid','brands.brandname','mobileno','amount','orderstatus','paymentstatus','trnid','wallet_deduction','use_wallet','amttopay','cardno','rechargeorders.created_at')
                ->leftJoin('brands','rechargeorders.brandid','=','brands.id')
                ->where('uniqueoid',$uniqueoid)
                ->first();  
             }
             elseif($request->type=='WALLET'){
                  $response=walletorder::where('uniqueoid',$uniqueoid)->first();
             }
             else
             {
                 return response()->json(['status'=>'N','data'=>'REQUEST FAILED']);
             }

            return response()->json(['status'=>'Y','data'=>$response]);

          }
          else{
             return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
          }

    }
    
    public function singleBrandproductlist($brandid)
    {
       $pbrand=brand::find($brandid);
       $pbrandid=$pbrand->id;
       $pbrandname=$pbrand->brandname;
       

       $products=product::where('brandid',$pbrandid)->get();
       $productarray=array();
       foreach ($products as $key => $product) {
        $pid=$product->id;
        $r=DB::table('rating')->where('productid',$pid)->pluck('rating')->first();
       $productarray[]=array('id'=>$product->id,'productname'=>$product->name,'cost'=>$product->cost,'promocost'=>$product->promocost,'coverphoto'=>URL::to('/').'/img/productimage/'.$product->image1,'rating'=>number_format((float)$r, 1, '.', ''));
              }       
       $p=array('brandid'=>$pbrandid,'brandname'=>$pbrandname,'products'=>$productarray);

       return response()->json($p);
    }

    public function brandwiseProducts()
    {
        $productsshow=array();
        $productbrands=product::select('products.*','brands.brandname','products.brandid')
                            ->leftJoin('brands','products.brandid','=','brands.id')
                            ->groupBy('products.brandid')
                            ->get();
         
         foreach ($productbrands as $key => $pbrand) {

       $pbrandid=$pbrand->brandid;
      
       $pbrandname=$pbrand->brandname;
       
       $products=product::where('brandid',$pbrandid)->get();
       $productarray=array();
       foreach ($products as $key => $product) {
        $pid=$product->id;
        $r=DB::table('rating')->where('productid',$pid)->pluck('rating')->first();
       $productarray[]=array('id'=>$product->id,'productname'=>$product->name,'cost'=>$product->cost,'promocost'=>$product->promocost,'coverphoto'=>URL::to('/').'/img/productimage/'.$product->image1,'rating'=>number_format((float)$r, 1, '.', ''));
              }       
       $p=array('brandid'=>$pbrandid,'brandname'=>$pbrandname,'products'=>$productarray);
       $productsshow[]=$p;
             
        }

        return response()->json($productsshow);
    }

    public function productBrands()
    {
         $brands=brand::all();
         $response=array();
         foreach ($brands as $key => $brand) {
            $response[]=array('id'=>$brand->id,'brandname'=>$brand->brandname,'brandlogo'=>URL::to('/').'/img/brandlogo/'.$brand->brandlogo);
         }
         return response()->json($response);
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

        return response()->json(['status'=>'Y','message'=>'REQUEST SUCCESS']);
  
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

         return response()->json(['status'=>'Y','message'=>'REQUEST SUCCESS']);
    
  }



    public function mobileRecharge(Request $request)
    {
       $token = $request->header('Authorization');
      if ($this->validateUser($token)) {
      	$id=$request->userid;
      	$orderid=$request->uniqueoid;
      	$paymentstatus=$request->paymentstatus;
      	$orderdet=Mobilerechargeorder::where('uniqueoid',$orderid)->first();
        $cid=$orderdet->user_id;
        $custdet=customer::find($cid);
        if($paymentstatus=='SUCCESS')
        {


      	if($orderdet->use_wallet='Y' && $orderdet->amttopay==0)
           {
           return $this->mobRechargeFromWallet($orderid);
           }
          else
          {
              $order=Mobilerechargeorder::where('uniqueoid',$orderid)->first();
              $order->paymentstatus="PAID";
              $order->save();
              $od=Mobilerechargeorder::select('mobilerechargeorders.*','mobileoperators.recharge_code','mobileoperators.postpaid_recharge_code')
             ->leftJoin('mobileoperators','mobilerechargeorders.brandid','=','mobileoperators.id')
             ->where('mobilerechargeorders.uniqueoid',$orderid)
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
              $trnid='OID'.$orderid.'MOBCUSTID'.$od->user_id;
              $custmsg=$provider.'$'.$customerno.'$'.$amt.'$'.$smspin.'$0$'.$trnid;

              $rechargeurl='http://onepayexpress.com/OpayeAdmin/RechargeAPI.aspx?UserID='.$userid.'&PASSWORD='. $password.'&MobileNo='.$mobno.'&Message='.$custmsg;

         //return $rechargeurl;
         $client = new \GuzzleHttp\Client();
         $response = $client->request('GET',$rechargeurl);
         $sta=$response->getBody();
         $arr=explode("=",$sta);

         $od1=Mobilerechargeorder::where('uniqueoid',$orderid)->first();
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
          
          return response()->json(['status'=>'Y','message'=>'REQUEST SUCCESS']);

          }

      }else{
      	$order=Mobilerechargeorder::where('uniqueoid',$orderid)->first();
              $order->paymentstatus="FAILED";
              $order->paymentstatus="FAILED";
              $order->save();

          return response()->json(['status'=>'Y','message'=>'REQUEST SUCCESS']);

      }


      }
      else
      {
        return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
      }
    }

     public function walletRecharge(Request $request)
     {
     	 $token = $request->header('Authorization');
      if ($this->validateUser($token)) {
      	$id=$request->userid;
      	$orderid=$request->uniqueoid;
      	$paymentstatus=$request->paymentstatus;
      	if ($paymentstatus=='SUCCESS') {
      	 $orderdet=walletorder::where('uniqueoid',$orderid)->first();
            $walletchk=wallet::where('user_id',$orderdet->user_id)
                      ->where('order_id',$orderdet->uniqueoid)
                      ->count();
            if ($walletchk==0) {
              $wallet=new wallet();
            $wallet->user_id=$orderdet->user_id;
            $wallet->order_id=$orderdet->uniqueoid;
            $wallet->credit=$orderdet->amounttopay;
            $wallet->debit=0;
            $wallet->addedby=$orderdet->user_id;
            $wallet->type='WALLET';
            $wallet->save();
            }
            
        

        $order=walletorder::where('uniqueoid',$orderid)->first();
        $order->paymentstatus="PAID";
        $order->orderstatus="SUCCESS";
        $order->save();
        return response()->json(['status'=>'Y','message'=>'REQUEST SUCCESS']);
      	}
      	else{
      	$order=walletorder::where('uniqueoid',$orderid)->first();
        $order->paymentstatus="FAILED";
        $order->orderstatus="FAILED";
        $order->save();
         return response()->json(['status'=>'Y','message'=>'REQUEST SUCCESS']);
      	}
      }
      else{
      	return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
      }

     }
     public function dthRecharge(Request $request)
    {
        $token = $request->header('Authorization');
      if ($this->validateUser($token)) {
      	$id=$request->userid;
      	$orderid=$request->uniqueoid;
      	$paymentstatus=$request->paymentstatus;
      	$orderdet=rechargeorder::where('uniqueoid',$orderid)->first();
        $cid=$orderdet->user_id;
        $custdet=customer::find($cid);
      	if($paymentstatus=='SUCCESS')
        {
                 

            if($orderdet->use_wallet='Y' && $orderdet->amttopay==0)
            {
               return $this->dthRechargeFromWallet($orderid);

            }
            else
            {
            	$order=rechargeorder::where('uniqueoid',$orderid)->first();
                $order->paymentstatus="PAID";
                $order->save();

            $od=rechargeorder::select('rechargeorders.*','brands.recharge_code')
             ->leftJoin('brands','rechargeorders.brandid','=','brands.id')
             ->where('rechargeorders.uniqueoid',$orderid)
             ->first();
              $userid=env('RECHARGE_API_USERID','');
        $password=env('RECHARGE_API_PASSWORD','');
        $mobno=env('RECHARGE_API_MOBILE_NO','');
        $smspin=env('RECHARGE_API_SMSPIN','');
        $provider=$od->recharge_code;
        $customerno=$od->cardno;
        $amt=$od->amount;
        $trnid='OID'.$orderid.'DTHCUSTID'.$od->user_id;
        $custmsg=$provider.'$'.$customerno.'$'.$amt.'$'.$smspin.'$0$'.$trnid;
        $odrid=$orderid;


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
         return response()->json(['status'=>'Y','message'=>'REQUEST SUCCESS']);

            }
        }
        else{
        	$order=rechargeorder::where('uniqueoid',$orderid)->first();
               $order->paymentstatus="FAILED";
               $order->orderstatus="FAILED";
               $order->save();
               return response()->json(['status'=>'Y','message'=>'REQUEST SUCCESS']);

        }

      }
      else
      {
      	 return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
      }
    }
    public function walletbalance(Request $request)
    {
      $token = $request->header('Authorization');
      if ($this->validateUser($token)) {
      	$id=$request->userid;
      $wallet=wallet::where('user_id',$id)->get();
      $walletbal=$wallet->sum('credit')-$wallet->sum('debit');

        return response()->json(['status'=>'Y','walletbalance'=>number_format((float)$walletbal, 2, '.', '')]);
      }
      else{
           return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
      }
    }
    public function walletHistory(Request $request)
    {
        $token = $request->header('Authorization');
      if ($this->validateUser($token)) {
      	$id=$request->userid;
      	$wallets=wallet::where('user_id',$id)->orderBy('created_at','DESC')->paginate(10);
      $wallet=wallet::where('user_id',$id)->get();
      $walletbal=$wallet->sum('credit')-$wallet->sum('debit');

        return response()->json(['status'=>'Y','data'=>$wallets,'walletbalance'=>number_format((float)$walletbal, 2, '.', '')]);
      }
      else{
           return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
      }
    }

    public function createWalletRecharge(Request $request)
    {
    	$token = $request->header('Authorization');
      if ($this->validateUser($token)) {
       $id=$request->userid;

       $walletorder=new walletorder();
       $walletorder->uniqueoid=time();
       $walletorder->user_id=$id;
       $walletorder->amounttopay=$request->amount;
       $walletorder->save();
       return response()->json(['status'=>'Y','data'=>$walletorder]);  

      }
      else
      {
      	return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
      }
    }

    public function createDthRecharge(Request $request)
    {
    	$token = $request->header('Authorization');
      if ($this->validateUser($token)) {
      	$id=$request->userid;
      	if($request->wallet=='true')
    {

      $wallet=wallet::where('user_id',$id)->get();
      $walletbal=$wallet->sum('credit')-$wallet->sum('debit');
      if($walletbal!=0){
      if($walletbal>$request->amt)
      {
         $amttopay=0;
      }
      else{
        $amttopay=number_format((float)$request->amt-$walletbal, 2, '.', '');
      }

      if($walletbal>=$request->amt)
      {
         $wallet_deduction=number_format((float)$request->amt, 2, '.', '');
      }
      else{
          $wallet_deduction=number_format((float)$walletbal, 2, '.', '');
      }

    $rechargeorder=new rechargeorder();
    $rechargeorder->user_id=$id;
    $rechargeorder->brandid=$request->brandid;
    $rechargeorder->cardno=$request->cardno;
    $rechargeorder->mobileno=$request->mobile;
    $rechargeorder->amount=$request->amt;
    $rechargeorder->wallet_deduction=$wallet_deduction;
    $rechargeorder->orderstatus="PENDING";
    $rechargeorder->paymentstatus="PENDING";
    $rechargeorder->use_wallet="Y";
    $rechargeorder->amttopay=$amttopay;
    $rechargeorder->uniqueoid=time();
    $rechargeorder->save();
    //$orderid=base64_encode($rechargeorder->uniqueoid);
    return response()->json(['status'=>'Y','data'=>$rechargeorder]);  
      }
      else
      {
         return 0;
      }
    }
    else
    {
  
     $rechargeorder=new rechargeorder();
    $rechargeorder->user_id=$id;
    $rechargeorder->brandid=$request->brandid;
    $rechargeorder->cardno=$request->cardno;
    $rechargeorder->mobileno=$request->mobile;
    $rechargeorder->amount=$request->amt;
    $rechargeorder->orderstatus="PENDING";
    $rechargeorder->paymentstatus="PENDING";
    $rechargeorder->use_wallet="N";
    $rechargeorder->amttopay=$request->amt;
    $rechargeorder->uniqueoid=time();
    $rechargeorder->save();
    //$orderid=base64_encode($rechargeorder->uniqueoid);
    return response()->json(['status'=>'Y','data'=>$rechargeorder]);
    }

      }
      else
      {
      	return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
      }
    }
    public function createMobileRecharge(Request $request)
    {
     $token = $request->header('Authorization');
      if ($this->validateUser($token)) {
      	$id=$request->userid;
      if($request->wallet=='true')
    {
      
      $wallet=wallet::where('user_id',$id)->get();
      $walletbal=$wallet->sum('credit')-$wallet->sum('debit');
          if($walletbal!=0){
      if($walletbal>$request->amt)
      {
         $amttopay=0;
      }
      else{
        $amttopay=number_format((float)$request->amt-$walletbal, 2, '.', '');
      }
      if($walletbal>=$request->amt)
      {
         $wallet_deduction=number_format((float)$request->amt, 2, '.', '');
      }
      else{
          $wallet_deduction=number_format((float)$walletbal, 2, '.', '');
      }
    $rechargeorder=new Mobilerechargeorder();
    $rechargeorder->user_id=$id;
    $rechargeorder->brandid=$request->operatorid;
    $rechargeorder->mobileno=$request->mobile;
    $rechargeorder->amount=$request->amt;
    $rechargeorder->circle=$request->circle;
    $rechargeorder->recharge_type=$request->type;
    $rechargeorder->wallet_deduction=$wallet_deduction;
    $rechargeorder->orderstatus="PENDING";
    $rechargeorder->paymentstatus="PENDING";
    $rechargeorder->use_wallet="Y";
    $rechargeorder->amttopay=$amttopay;
    $rechargeorder->uniqueoid=time();
    $rechargeorder->save();
    //$orderid=base64_encode($rechargeorder->uniqueoid);
    return response()->json(['status'=>'Y','data'=>$rechargeorder]);
  }
  else{
     return 0;
  }
      
    }
    else
    {

    $rechargeorder=new Mobilerechargeorder();
    $rechargeorder->user_id=$id;
    $rechargeorder->brandid=$request->operatorid;
    $rechargeorder->mobileno=$request->mobile;
    $rechargeorder->amount=$request->amt;
    $rechargeorder->circle=$request->circle;
    $rechargeorder->recharge_type=$request->type;
    $rechargeorder->orderstatus="PENDING";
    $rechargeorder->paymentstatus="PENDING";
    $rechargeorder->uniqueoid=time();
    $rechargeorder->use_wallet="N";
    $rechargeorder->amttopay=$request->amt;
    $rechargeorder->save();
    //$orderid=base64_encode($rechargeorder->uniqueoid);
    return response()->json(['status'=>'Y','data'=>$rechargeorder]);
    }
      }
      else{
      return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
      }
    }

    public function rechargeHistory(Request $request)
    {
    	$token = $request->header('Authorization');
      if ($this->validateUser($token)) {
            $id=$request->userid;
           $rechargehistory=DB::table('rechargehistory')
          ->select('rechargehistory.uniqueoid','rechargehistory.user_id','rechargehistory.mobileno','rechargehistory.amount','rechargehistory.orderstatus','rechargehistory.paymentstatus','rechargehistory.trnid','rechargehistory.wallet_deduction','rechargehistory.use_wallet','rechargehistory.amttopay','rechargehistory.circle','rechargehistory.recharge_type','rechargehistory.cardno','rechargehistory.rec_type','brands.brandname','mobileoperators.operatorname','rechargehistory.created_at','mobileoperators.brandlogo as moblogo','brands.brandlogo as dthlogo')
                       ->where('user_id',$id)
                       ->leftJoin('brands','rechargehistory.dth_brand','=','brands.id')
                       ->leftJoin('mobileoperators','rechargehistory.mob_brand','=','mobileoperators.id')
                       ->paginate(10);

         return response()->json(['status'=>'Y','data'=>$rechargehistory]);
      }
      else{
      	return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
      }
    }

    public function updateProfile(Request $request)
    {
      $token = $request->header('Authorization');
      if ($this->validateUser($token)) {
           $id=$request->userid;
           $customer=customer::find($id);
           if ($request->name!='') {
           	$customer->name=$request->name;
           }
           if ($request->email!='')
           {
           	$customer->email=$request->email;
           }
           
           
           $customer->save();
           return response()->json(['status'=>'Y','data'=>$customer]);
       }
       else{
       	  return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
       }
    }

    public function profile(Request $request)
    {
          $token = $request->header('Authorization');
          $id=$request->userid;
          if ($this->validateUser($token)) {
          	  $customer=customer::find($id);
          	  return response()->json(['status'=>'Y','data'=>$customer]);
          }
          else{
              return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
          }
    }

    public function sliders()
    {
    	 $sliders=slider::all();
    	 $data=array();
    	 foreach ($sliders as $key => $slider) {
    	 	$data[]=array('id'=>$slider->id,'url'=>URL::to('/').'/img/sliderimage/'.$slider->image,'title'=>$slider->title,'description'=>$slider->description);
    	 }

    	 return response()->json($data);
    }
    public function dthOperators()
    {
    	$operators=brand::select('id','brandname')->get();
         return response()->json($operators);
    }
    public function mobileOperators()
    {
       $operators=Mobileoperator::select('id','operatorname')->get();

       return response()->json($operators);
    }
    public function userRegister(Request $request)
    {       
       $rules=[
               
                'mobile'  => 'required|unique:customers|min:10',
                'email'   => 'required|unique:customers',
                'password' =>'required|min:5'
              ];
        
       $validator = Validator::make($request->all(), $rules);

           if ($validator->fails()) {
      
                  return response()->json([
                      'validation-errors' => $validator->messages(),
                       'status-code'=>false
                       ]);
             } 
             else
             { 
             	      $customer=new customer();
             	      $customer->name=$request->name;
                      $customer->email=$request->email;
                      $customer->mobile=$request->mobile;
                      $customer->password=$request->password;
                      $customer->api_token=$this->apiToken;
                      $customer->save();

                      if ($customer) {

                      	  return response()->json(['data'=>$customer,'message'=> 'Successfully Registered','status-code'=>true]);
                      }
                      else{
                           return response(['data' => '','message' => 'Registration Failed','status-code'=>false])->json();
                      }
             }

       
       
         
      
    }


  public function postLogout(Request $request)
  {
    $token = $request->header('Authorization');
    $user = customer::where('api_token',$token)->first();
    if($user) {
      $postArray = ['api_token' => null];
      $logout = customer::where('id',$user->id)->update($postArray);
      if($logout) {
        return response()->json([
          'status' => 'Y',
          'message' => 'User Logged Out',
        ]);
      }
    } else {
      return response()->json([
      	'status' => 'N',
        'message' => 'User not found',
      ]);
    }
  }
  public function ajaxlogin(Request $request)
    { 

        $current_time = Carbon::now();
        
        if($request->otp!='')
        {
           $time=otp::where('mobile',$request->mobile)->where('otp',$request->otp)->orderBy('id','DESC')->pluck('created_at')->first();
           if($time=='')
           {
             $resp=['status'=>"N",'message'=>"INVALID OTP"];
              return response()->json($resp);
           }
           else
           {
            $totalDuration = $current_time->diffInSeconds($time);
            if($totalDuration<901)
               {
          $postArray = ['api_token' => $this->apiToken];
          $login = customer::where('mobile',$request->mobile)->update($postArray);
              $userdetails=customer::where('mobile',$request->mobile)->first();
               $response=array('id'=>$userdetails->id,'email'=>$userdetails->email,'name'=>$userdetails->name,'mobile'=>$userdetails->mobile,'api_token'=>$userdetails->api_token);
                  //session(['userid' =>$response]);
                 /* Session::put('userid', $response);
                  Session::save();*/
                  $resp=['status'=>"Y",'response'=>$response];
              return response()->json($resp);
              }
              else
              {
                 $resp=['status'=>"N",'message'=>"OTP EXPIRED"];
              return response()->json($resp);
              }
           }
        }
        else
        {
           
            $userdetails=customer::where('mobile',$request->mobile)->where('password',$request->password)->first();
            if($userdetails)
            {
          $postArray = ['api_token' => $this->apiToken];
          $login = customer::where('mobile',$request->mobile)->update($postArray);
              $userdetails=customer::where('mobile',$request->mobile)->first();
               $response=array('id'=>$userdetails->id,'email'=>$userdetails->email,'name'=>$userdetails->name,'mobile'=>$userdetails->mobile,'api_token'=>$userdetails->api_token);
                  //session(['userid' =>$response]);
                  /*Session::put('userid', $response);
                  Session::save();*/
                  $resp=['status'=>"Y",'response'=>$response];
              return response()->json($resp);

            }
            else
            {
              $resp=['status'=>"N",'message'=>"DETAILS INCORRECT"];
              return response()->json($resp);
            }
        }
    }

 public function sendOtp(Request $request)
    {
    	$appcode=$request->appcode;
    	$mob=$request->mobile;
        $count=customer::where('mobile',$mob)->count();
        if($count>0)
        {
           $otpvalue=rand(100000,999999);

        	$otp=new otp();
        	$otp->mobile=$mob;
        	$otp->otp=$otpvalue;
        	$otp->save();

          try{
    
                
    $msg=urlencode("<#>Your OTP for DTHSEVA is:".$otp->otp.' '.$appcode); 
 try
 {
 //return "http://login.questersms.com/api/mt/SendSMS?user=DTHSEVA&password=rasmi9437&senderid=DTHSVA&channel=Trans&DCS=0&flashsms=0&number=".$otp->mobile."&text=".$msg;
  
  $url=file_get_contents("http://login.questersms.com/api/mt/SendSMS?user=DTHSEVA&password=rasmi9437&senderid=DTHSVA&channel=Trans&DCS=0&flashsms=0&number=".$otp->mobile."&text=".$msg);
  
  return response()->json(['status'=>'Y','message'=>'success']);
}
catch(Exception $e)
{
    
}
   // dd($url);
}
catch(Exception $e) {

	return response()->json(['status'=>'N','message'=>'failed']);
}  

        }
        else
        {
        	return response()->json(['status'=>'N','message'=>'failed']);
        }

    }

   public function circles()
   {
   	  $circlearray=array('Andhra Pradesh Telangana','Assam','Bihar Jharkhand','Chennai','Delhi NCR','Gujarat','Haryana','Himachal Pradesh','Jammu Kashmir','Karnataka','Kerala','Kolkata','Madhya Pradesh Chhattisgarh','Maharashtra Goa','Mumbai','North East','Orissa','Punjab','Rajasthan','Tamil Nadu','UP East','UP West','West Bengal');

   	  return response()->json($circlearray);
   }

 public function changePassword(Request $request)
     {
    $token = $request->header('Authorization');
    
   if($this->validateUser($token)){


    $id=$request->userid;
   
    $customer=customer::find($id);
    $customerpassword=$customer->password;
    
    if($request->oldpassword==$customerpassword)
    {
         if($request->newpassword==$request->confirmpassword)
         {
            $customer->password=$request->newpassword;
            $customer->save();
            //return "1";
            return response()->json(['status'=>'Y','message'=>'Password Changed Successfully']);
         }
         else
         {
         	 return response()->json(['status'=>'N','message'=>'Newpassword and Confirmpassword mismatch']);
            //return "Newpassword and Confirmpassword mismatch";
         }
    }
    else
    {
        //return "Incorrect Old Password";
        return response()->json(['status'=>'N','message'=>'Incorrect Old Password']);
    }
   }

   else
   {
   	     return response()->json(['status'=>'I','message'=>'INVALID REQUEST']);
   }

    }

}

                           
                             
                            
                 
                             
                              
                             
                             
                             
