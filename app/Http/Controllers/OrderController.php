<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use App\orederaddress;
use App\rechargeorder;
use App\customer;
use App\product;
use App\paytmrecharge;
use App\response;
use App\Mobilerechargeorder;
use App\onepayresponse;
use App\wallet;
use App\walletorder;
use App\assigneduser;
use Auth;





class OrderController extends Controller
{


    public function viewwallettopup($id)
    {
      $rechargeorder=walletorder::select('walletorders.*','customers.name','customers.mobile')
       ->leftJoin('customers','walletorders.user_id','=','customers.id')
       ->orderBy('walletorders.created_at','desc')
       ->where('walletorders.id',$id)
       ->first();

       $paytmstatus=paytmrecharge::where('orderid',$rechargeorder->uniqueoid)->get();

       return view('viewwallettopup',compact('rechargeorder','paytmstatus'));
    }

    public function viewdthrecharge($id)
    {
         $rechargeorder=rechargeorder::select('rechargeorders.*','brands.brandname','customers.name','customers.mobile')
       ->leftJoin('brands','rechargeorders.brandid','=','brands.id')
       ->leftJoin('customers','rechargeorders.user_id','=','customers.id')
       ->orderBy('rechargeorders.created_at','desc')
       ->where('rechargeorders.id',$id)
       ->first();
        $wallet=wallet::where('order_id',$rechargeorder->uniqueoid)->where('credit','>',0)->first();
        if ($wallet) {
           $walletbalgain=$wallet->credit;
        }
        else
        {
             $walletbalgain=0;
        }
        $paytmstatus=paytmrecharge::where('orderid',$rechargeorder->uniqueoid)->get();
        $onepayresponses=onepayresponse::where('tno',$rechargeorder->trnid)->get();
        return view('viewdthrecharge',compact('rechargeorder','paytmstatus','onepayresponses','walletbalgain'));
       // return compact('order','paytmstatus');

    }
    public function viewmobilerecharge($id)
    {
         $rechargeorder=Mobilerechargeorder::select('mobilerechargeorders.*','mobileoperators.operatorname','customers.name','customers.mobile')
       ->leftJoin('mobileoperators','mobilerechargeorders.brandid','=','mobileoperators.id')
       ->leftJoin('customers','mobilerechargeorders.user_id','=','customers.id')
       ->orderBy('mobilerechargeorders.created_at','desc')
       ->where('mobilerechargeorders.id',$id)
       ->first();
       $wallet=wallet::where('order_id',$rechargeorder->uniqueoid)->where('credit','>',0)->first();
        if ($wallet) {
           $walletbalgain=$wallet->credit;
        }
        else
        {
             $walletbalgain=0;
        }
        $paytmstatus=paytmrecharge::where('orderid',$rechargeorder->uniqueoid)->get();
        $onepayresponses=onepayresponse::where('tno',$rechargeorder->trnid)->get();
        //return compact('rechargeorder','paytmstatus','onepayresponses');
        return view('viewmobilerecharge',compact('rechargeorder','paytmstatus','onepayresponses','walletbalgain'));
       // 

    }
    public function backendupdatestatus(Request $request)
    {
      $orders=order::find($request->oid);
      $orders->orderstatus=$request->typ;
      $orders->cancelreason=$request->cancelreason;
      $orders->dispatchdetails=$request->dispatchdetails;
      $orders->save();
                  try{
            $msg1=urlencode("Your order DHSEVA# ".$orders->id." is now ".$orders->orderstatus." " ); 
          
/*$url=file_get_contents("http://www.smsjust.com/sms/user/urlsms.php?username=dthsva&pass=Dth@1234&senderid=DTHSVA&dest_mobileno=".$orders->mobile."&message=".$msg1);

}
catch(Exception $e){
     print('Error: ' . $e->getMessage());
}*/

$url=file_get_contents("http://login.questersms.com/api/mt/SendSMS?user=DTHSEVA&password=rasmi9437&senderid=DTHSVA&channel=Trans&DCS=0&flashsms=0&number=".$orders->mobile."&text=".$msg1);
     }
catch(Exception $e){
     print('Error: ' . $e->getMessage());
}
  
        
      return back();
    }

    public function productorders(Request $request)
    {

      $data=$request->all();

      $orderstatuses=order::select('orderstatus')->groupBy('orderstatus')->get();
      $orders=order::select('orders.*','products.name as productname','orderaddresses.address','orderaddresses.pincode','orderaddresses.city','orderaddresses.state','customers.name as orderby')
      ->leftJoin('products','orders.productid','products.id')
      ->leftJoin('orderaddresses','orderaddresses.orderid','orders.id')
      ->leftJoin('customers','customers.id','orders.userid')
      ->groupBy('orders.id')
      ->orderBy('orders.id','desc');

      if ($request->has('paymentstatus') && $request->get('paymentstatus')!='ALL') {

          $orders=$orders->where('paymentstatus',$request->get('paymentstatus'));
       }
       if ($request->has('orderstatus') && $request->get('orderstatus')!='ALL') {


          $orders=$orders->where('orderstatus',$request->get('orderstatus'));
       }
       if ($request->has('search') && $request->get('search')!='') {
          $keyword=$request->get('search');
          $orders=$orders->where(function ($query) use($keyword) {
        $query->where('orders.id', 'like', '%' . $keyword . '%')
           ->orWhere('orders.created_at', 'like', '%' . $keyword . '%')
           ->orWhere('orders.productprice', 'like', '%' . $keyword . '%')
           ->orWhere('orders.amountpaid', 'like', '%' . $keyword . '%')
           ->orWhere('orders.discount', 'like', '%' . $keyword . '%')
           ->orWhere('orders.couponcode', 'like', '%' . $keyword . '%')
           ->orWhere('customers.name', 'like', '%' . $keyword . '%')
           ->orWhere('orders.orderstatus', 'like', '%' . $keyword . '%')
           ->orWhere('products.name', 'like', '%' . $keyword . '%')
           ->orWhere('orderaddresses.address', 'like', '%' . $keyword . '%')
           ->orWhere('orderaddresses.pincode', 'like', '%' . $keyword . '%')
           ->orWhere('orderaddresses.city', 'like', '%' . $keyword . '%')
           ->orWhere('orderaddresses.state', 'like', '%' . $keyword . '%')
           ->orWhere('orders.paymentstatus', 'like', '%' . $keyword . '%');
      });
       }
       $orders=$orders->orderBy('orders.created_at','desc')
       ->paginate(10);
      return view('productorders',compact('orders','orderstatuses','data'));
    }

    public function orderdetails($oid)
    {
    	$order=order::select('orders.*','products.name as productname','orderaddresses.address','orderaddresses.pincode','orderaddresses.city','orderaddresses.state','customers.name as orderby')
    	->leftJoin('products','orders.productid','products.id')
    	->leftJoin('orderaddresses','orders.id','orderaddresses.orderid')
    	->leftJoin('customers','orders.userid','customers.id')
    	
      ->where('orders.id',$oid)
    	->first();

      $userdetails=customer::find($order->userid);
      $productdetails=product::find($order->productid);
       
     //  dd($productdetails);
    	return view('orderdetails',compact('order','userdetails','productdetails'));
    }
    public function walletTopup(Request $request)
    {
      $data = $request->all();
      $myids=assigneduser::where('adminid','=',Auth::id())->select('uid')->get();
      $rechargeorders=walletorder::select('walletorders.*','customers.name','customers.mobile')
               ->leftJoin('customers','walletorders.user_id','=','customers.id');
      if (Auth::user()->usertype == "SUB ADMIN") {

          $rechargeorders=$rechargeorders->whereIn('customers.id',$myids);
       }
      if ($request->has('paymentstatus') && $request->get('paymentstatus')!='ALL') {


          $rechargeorders=$rechargeorders->where('paymentstatus',$request->get('paymentstatus'));
       }
       if ($request->has('orderstatus') && $request->get('orderstatus')!='ALL') {


          $rechargeorders=$rechargeorders->where('orderstatus',$request->get('orderstatus'));
       }
         if ($request->has('search') && $request->get('search')!='') {
          $keyword=$request->get('search');
          $rechargeorders=$rechargeorders->where(function ($query) use($keyword) {
        $query->where('walletorders.id', 'like', '%' . $keyword . '%')
           ->orwhere('walletorders.uniqueoid', 'like', '%' . $keyword . '%')
           ->orwhere('walletorders.orderstatus', 'like', '%' . $keyword . '%')
           ->orwhere('walletorders.paymentstatus', 'like', '%' . $keyword . '%')
           ->orwhere('walletorders.amounttopay', 'like', '%' . $keyword . '%')
           ->orwhere('walletorders.created_at', 'like', '%' . $keyword . '%')
           ->orWhere('customers.mobile', 'like', '%' . $keyword . '%')
           ->orWhere('customers.name', 'like', '%' . $keyword . '%');
      });
       }
       $rec=$rechargeorders->get();
       $rechargeorders=$rechargeorders->orderBy('walletorders.created_at','desc')
       ->paginate(10);
      $sum=$rec->sum('amounttopay');

       return view('wallettopup',compact('rechargeorders','data','sum'));


    }

    public function rechargeorders(Request $request)
    {

       $data = $request->all();
       $myids=assigneduser::where('adminid','=',Auth::id())->select('uid')->get();
       //return Auth::user()->usertype;
       $rechargeorders=rechargeorder::select('rechargeorders.*','brands.brandname','customers.name')
       ->leftJoin('brands','rechargeorders.brandid','=','brands.id')
       ->leftJoin('customers','rechargeorders.user_id','=','customers.id');
       if (Auth::user()->usertype == "SUB ADMIN") {

          $rechargeorders=$rechargeorders->whereIn('customers.id',$myids);
       }

       if ($request->has('paymentstatus') && $request->get('paymentstatus')!='ALL') {

          $rechargeorders=$rechargeorders->where('paymentstatus',$request->get('paymentstatus'));
       }
       if ($request->has('orderstatus') && $request->get('orderstatus')!='ALL') {


          $rechargeorders=$rechargeorders->where('orderstatus',$request->get('orderstatus'));
       }
       if ($request->has('search') && $request->get('search')!='') {
          $keyword=$request->get('search');
          $rechargeorders=$rechargeorders->where(function ($query) use($keyword) {
        $query->where('rechargeorders.id', 'like', '%' . $keyword . '%')
           ->orWhere('customers.name', 'like', '%' . $keyword . '%')
           ->orWhere('brands.brandname', 'like', '%' . $keyword . '%')
           ->orWhere('mobileno', 'like', '%' . $keyword . '%')
           ->orWhere('amount', 'like', '%' . $keyword . '%')
           ->orWhere('orderstatus', 'like', '%' . $keyword . '%')
           ->orWhere('paymentstatus', 'like', '%' . $keyword . '%')
           ->orWhere('uniqueoid', 'like', '%' . $keyword . '%')
           ->orWhere('cardno', 'like', '%' . $keyword . '%');
      });
       }

       $rechargeorders=$rechargeorders->orderBy('rechargeorders.created_at','desc')
       ->paginate(10);

      // return $rechargeorders;
       
       return view('rechargeorders',compact('rechargeorders','data'));
    }

     public function mobilerechargeorders(Request $request)
    {

       $data = $request->all();
       $myids=assigneduser::where('adminid','=',Auth::id())->select('uid')->get();
       $rechargeorders=Mobilerechargeorder::select('mobilerechargeorders.*','mobileoperators.operatorname','customers.name')
       ->leftJoin('mobileoperators','mobilerechargeorders.brandid','=','mobileoperators.id')
       ->leftJoin('customers','mobilerechargeorders.user_id','=','customers.id');


       if (Auth::user()->usertype == "SUB ADMIN") {

          $rechargeorders=$rechargeorders->whereIn('customers.id',$myids);
       }


       if ($request->has('paymentstatus') && $request->get('paymentstatus')!='ALL') {

          $rechargeorders=$rechargeorders->where('paymentstatus',$request->get('paymentstatus'));
       }
       if ($request->has('orderstatus') && $request->get('orderstatus')!='ALL') {


          $rechargeorders=$rechargeorders->where('orderstatus',$request->get('orderstatus'));
       }
       if ($request->has('search') && $request->get('search')!='') {
          $keyword=$request->get('search');
          $rechargeorders=$rechargeorders->where(function ($query) use($keyword) {
        $query->where('mobilerechargeorders.id', 'like', '%' . $keyword . '%')
           ->orWhere('customers.name', 'like', '%' . $keyword . '%')
           ->orWhere('mobileoperators.operatorname', 'like', '%' . $keyword . '%')
           ->orWhere('mobileno', 'like', '%' . $keyword . '%')
           ->orWhere('amount', 'like', '%' . $keyword . '%')
           ->orWhere('orderstatus', 'like', '%' . $keyword . '%')
           ->orWhere('uniqueoid', 'like', '%' . $keyword . '%')
           ->orWhere('paymentstatus', 'like', '%' . $keyword . '%');
          
      });
       }

       $rechargeorders=$rechargeorders->orderBy('mobilerechargeorders.created_at','desc')
       ->paginate(10);

      //return $rechargeorders;
       
       return view('mobilerechargeorders',compact('rechargeorders','data'));
    }
   /* public function changeRechargeOrderstatus(Request $request)
    {
    	$rechargeorders=rechargeorder::find($request->roid);
    	$rechargeorders->orderstatus=$request->status;
    	$rechargeorders->reason=$request->reason;
    	$rechargeorders->save();
    	
    	          try{
            $msg=urlencode("Thank you For Recharging with DTHSEVA Your order is now ".$request->status."."); 

$url=file_get_contents("http://www.smsjust.com/sms/user/urlsms.php?username=dthsva&pass=Dth@1234&senderid=DTHSVA&dest_mobileno=".$rechargeorders->mobileno."&message=".$msg);
//dd($url);
}
catch(Exception $e){
     print('Error: ' . $e->getMessage());
}

    	return back();


    }*/
}
