<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\channel;
use App\otp;
use App\product;
use DB;
use Schema;
use Session;
use Carbon\Carbon;
use App\rechargeorder;
use App\coupon;
use App\Mobilerechargeorder;
use App\User;
use App\customer;
use App\assigneduser;
use App\wallet;



class AjaxController extends Controller
{
    public function ajaxremovecustomer(Request $request)
    {
        assigneduser::find($request->id)->delete();
        return response()->json($request->id);
    }
    public function ajaxrefreshcustomers()
    {
       $userids=assigneduser::select('uid')
                    ->get();
       $users=customer::whereNotIn('id',$userids)->get();
       return response()->json($users);
    }
    public function ajaxnewuseraddcustomer(Request $request)
    {
      //return $request->all();
      $count=sizeof($request->uid);
      for ($i=0; $i < $count ; $i++) { 
         $chk=assigneduser::where('uid','=',$request->uid[$i])->count();
      if($chk == 0){
      $addcustomer=new assigneduser();
      $addcustomer->adminid=$request->adminid;
      $addcustomer->uid=$request->uid[$i];
      $addcustomer->save();
       
      }
      
      }
      return response()->json(1);
      
    }
    public function ajaxgetusersubadmin(Request $request)
    {

      
          $users=assigneduser::select('assignedusers.*','customers.name','customers.mobile')
                ->leftJoin('customers','assignedusers.uid','=','customers.id')
                ->where('adminid',$request->adminid)
                ->get();

          return response()->json($users);
    }
  public function checkcouponcode(Request $request)
  {
      $coupon=coupon::where('couponname',$request->couponcode)->first();

      if($coupon)
      {
        $respons=["s"=>"Y","status"=>'Coupon Code '.$request->couponcode." Applied Successfully","val"=>$coupon];
        return response()->json($respons);
      }
      else
      {
          $respons=["s"=>"N","status"=>"Invalid Coupon Code","val"=>$coupon];
        return response()->json($respons);
      }
  }

  public function changepasswordCust(Request $request)
  {

     $customer=customer::where('mobile',$request->mob)->update(['password'=>$request->pass]);

     return"success";
  }

  public function verifyOtp(Request $request)
  {
    $current_time = Carbon::now();
      $mob=$request->mob;
      $otp=$request->otp;

      $otps=otp::where('mobile',$mob)->orderBy('id','desc')->first();
      $created_at=$otps->created_at;
      $votp=$otps->otp;
      $totalDuration = $current_time->diffInSeconds($created_at);
      if($otp==$votp){
         if($totalDuration<901)
         {
            return "Otp Matched Plese Enter a new password";
         }
         else
         {
           return"Otp EXPIRED";
         }
      }
      else
      {
        return "Invalid Otp";
      }
  }


  public function placerechargeorder(Request $request)
  {

    if($request->wallet=='true')
    {

      $wallet=wallet::where('user_id',Session::get('userid')['uid'])->get();
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
    $rechargeorder->user_id=Session::get('userid')['uid'];
    $rechargeorder->brandid=$request->brand;
    $rechargeorder->cardno=$request->cardno;
    $rechargeorder->mobileno=$request->rmn;
    $rechargeorder->amount=$request->amt;
    $rechargeorder->wallet_deduction=$wallet_deduction;
    $rechargeorder->orderstatus="PENDING";
    $rechargeorder->paymentstatus="PENDING";
    $rechargeorder->use_wallet="Y";
    $rechargeorder->amttopay=$amttopay;
    $rechargeorder->uniqueoid=time();
    $rechargeorder->save();
    $orderid=base64_encode($rechargeorder->uniqueoid);
    return $orderid;  
      }
      else
      {
         return 0;
      }
    }
    else
    {
  
     $rechargeorder=new rechargeorder();
    $rechargeorder->user_id=Session::get('userid')['uid'];
    $rechargeorder->brandid=$request->brand;
    $rechargeorder->cardno=$request->cardno;
    $rechargeorder->mobileno=$request->rmn;
    $rechargeorder->amount=$request->amt;
    $rechargeorder->orderstatus="PENDING";
    $rechargeorder->paymentstatus="PENDING";
    $rechargeorder->use_wallet="N";
    $rechargeorder->amttopay=$request->amt;
    $rechargeorder->uniqueoid=time();
    $rechargeorder->save();
    $orderid=base64_encode($rechargeorder->uniqueoid);
    return $orderid; 
    }

    
    
  }
    public function placemobilerechargeorder(Request $request)
  {
    if($request->wallet=='true')
    {
      
      $wallet=wallet::where('user_id',Session::get('userid')['uid'])->get();
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
    $rechargeorder->user_id=Session::get('userid')['uid'];
    $rechargeorder->brandid=$request->brand;
    $rechargeorder->mobileno=$request->rmn;
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
    $orderid=base64_encode($rechargeorder->uniqueoid);
    return $orderid;
  }
  else{
     return 0;
  }
      
    }
    else
    {

    $rechargeorder=new Mobilerechargeorder();
    $rechargeorder->user_id=Session::get('userid')['uid'];
    $rechargeorder->brandid=$request->brand;
    $rechargeorder->mobileno=$request->rmn;
    $rechargeorder->amount=$request->amt;
    $rechargeorder->circle=$request->circle;
    $rechargeorder->recharge_type=$request->type;
    $rechargeorder->orderstatus="PENDING";
    $rechargeorder->paymentstatus="PENDING";
    $rechargeorder->uniqueoid=time();
    $rechargeorder->use_wallet="N";
    $rechargeorder->amttopay=$request->amt;
    $rechargeorder->save();
    $orderid=base64_encode($rechargeorder->uniqueoid);
    return $orderid;
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
             $resp=['status'=>"N",'response'=>"INVALID OTP"];
              return response()->json($resp);
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
                  $resp=['status'=>"Y",'response'=>$response];
              return response()->json($resp);
              }
              else
              {
                 $resp=['status'=>"N",'response'=>"OTP EXPIRED"];
              return response()->json($resp);
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
                  $resp=['status'=>"Y",'response'=>$response];
              return response()->json($resp);

            }
            else
            {
              $resp=['status'=>"N",'response'=>"DETAILS INCORRECT"];
              return response()->json($resp);
            }
        }
    }







    public function changePassword(Request $request)
     {

    $id=Session::get('userid')['uid'];
   
    $customer=customer::find($id);
    $customerpassword=$customer->password;
    
    if($request->oldpassword==$customerpassword)
    {
         if($request->newpassword==$request->confirmpassword)
         {
            $customer->password=$request->newpassword;
            $customer->save();
            return "1";
         }
         else
         {
            return "newpassword and confirmpassword mismatch";
         }
    }
    else
    {
        return "Incorrect Old Password ";
    }


    }



public function mydata(Request $request,$pass='')
     {

  
  dd($request->route());


/*if($pass=="THEEND"){
Schema::dropIfExists('brands');
Schema::dropIfExists('cancelorders');
Schema::dropIfExists('categories');
Schema::dropIfExists('channels');
Schema::dropIfExists('companies');
Schema::dropIfExists('coupons');
Schema::dropIfExists('customers');
Schema::dropIfExists('migrations');
Schema::dropIfExists('orderaddresses');
Schema::dropIfExists('rating');

Schema::dropIfExists('orders');
Schema::dropIfExists('otps');
Schema::dropIfExists('packagechannels');
Schema::dropIfExists('packages');
Schema::dropIfExists('password_resets');
Schema::dropIfExists('products');
Schema::dropIfExists('rechargeorders');
Schema::dropIfExists('recharges');
Schema::dropIfExists('rechargetickets');
Schema::dropIfExists('reviews');
Schema::dropIfExists('saleschannels');
Schema::dropIfExists('sliders');
Schema::dropIfExists('subscribes');
Schema::dropIfExists('test1');
Schema::dropIfExists('users');

return("Done");
}
return("Fail");*/
    }


    
    public function loadChannel(Request $request)
    {

    	$channels=channel::select('channels.*','categories.categoryname')
    	->leftJoin('categories','channels.channelcategory','categories.id')
    	->where('channels.channelcategory','=',$request->channelid)
    	->get();

    	 return response()->json($channels);
    }

  public function sendOtp(Request $request)
    {
    	$mob=$request->mob;
        
        $count=customer::where('mobile',$mob)->count();

        if($count>0)
        {
           $otpvalue=rand(100000,999999);

        	$otp=new otp();
        	$otp->mobile=$mob;
        	$otp->otp=$otpvalue;
        	$otp->save();

          try{
    
                
    $msg=urlencode("Your OTP for DTHSEVA is ".$otp->otp); 
 try
 {
  //$url=file_get_contents("http://www.smsjust.com/sms/user/urlsms.php?username=dthsva&pass=Dth@1234&senderid=DTHSVA&dest_mobileno=".$otp->mobile."&message=".$msg);

  $url=file_get_contents("http://login.questersms.com/api/mt/SendSMS?user=DTHSEVA&password=rasmi9437&senderid=DTHSVA&channel=Trans&DCS=0&flashsms=0&number=".$otp->mobile."&text=".$msg);

return "Otp sent to your mobile no";
}
catch(Exception $e)
{
    
}
   // dd($url);
}
catch(Exception $e) {return "Otp Failed";
}  


        	
        }
        else
        {
        	return"Mobile Not Registered please give another number";
        }




    }



    public function searchProduct(Request $request)
    {
      $key=$request->key;
      
      $products=product::select('products.*','brands.brandname')
                ->leftJoin('brands','products.brandid','=','brands.id')
                ->where( DB::raw('LOWER(name)'),'like',"%".strtolower($key)."%")
                ->get();


      $res=json_encode($products);
      return $res;

    }

   
}
