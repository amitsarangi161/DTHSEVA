<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;
use App\product;
use App\company;
use App\customer;
use App\order;
use App\rechargeorder;
use App\Mobilerechargeorder;
use App\paytmrecharge;
use App\onepayresponse;

use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   /* public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=customer::where('id','>',0)->count();
        $porders=order::where('id','>',0)->count();
        $rorders=rechargeorder::where('id','>',0)->count();
        $rorders=rechargeorder::where('id','>',0)->count();
        $totalproducts=product::where('id','>',0)->count();
        $faileddthrechargeorders=rechargeorder::where('paymentstatus','PAID')
          ->where('orderstatus', '=', 'FAILED')->count(); 
        $failedmobilerechargeorders=Mobilerechargeorder::where('paymentstatus','PAID')
          ->where('orderstatus', '=', 'FAILED')->count();

        return view('home',compact('customers','porders','rorders','totalproducts','faileddthrechargeorders','failedmobilerechargeorders'));
    }
    
    public function companypolicy()
    {
        $company=company::first();
        return view('companypolicy',compact('company'));
    }
    public function companypolicyupdate(Request $request)
    {
        $company=company::find(1);
        $company->aboutus=$request['aboutus'];
        $company->tnc=$request['tnc'];
        $company->privacy=$request['privacy'];
        $company->refund=$request['refund'];
        
        $company->save();
        return back();
    }
    public function viewallcustomer()
    {

        $customers=customer::select('id','name','email','mobile')->paginate(500);
        return view('viewallcustomers',compact('customers'));
    }
    public function sendmsg(Request $request)
    {
        
        $customers=$request->customercheck;
        $message=$request->message;
        $count=count($customers);
        if($count>0 && $message!='')
        {
             foreach ($customers as $key => $value) {
                  try{
    
                
       $msg=urlencode($message); 
      $url=file_get_contents("http://www.smsjust.com/sms/user/urlsms.php?username=dthsva&pass=Dth@1234&senderid=DTHSVA&dest_mobileno=".$value."&message=".$msg);

   
}
catch(Exception $e) {

}  

             }

    Session::flash('msg','Message sent Successfully to '.$count.' customers');
    return back();
        }
        else
        {
            Session::flash('msg','Please choose atleast one customer and Message Field cant be blank');
            return back();
        }
    }
    public function offerimage()
    {
        return view('offerimage');
    }
    public function saveofferimage(Request $request)
    {
        $rarefile = $request->file('image');
        if($rarefile!='')
        {
        
        $raupload ="img";
        $uplogoimg="offer.jpg";
        $success=$rarefile->move($raupload,$uplogoimg);
        
        }
       return redirect('/home');
    }
    public function addcustomer(Request $request)
   {
      $customers=customer::orderBy('created_at', 'desc');

       if ($request->has('search') && $request->get('search')!='') {
          $keyword=$request->get('search');
          $customers=$customers->where(function ($query) use($keyword) {
          $query->where('customers.id', 'like', '%' . $keyword . '%')
           ->orWhere('customers.name', 'like', '%' . $keyword . '%')
           ->orWhere('customers.email', 'like', '%' . $keyword . '%')
           ->orWhere('customers.mobile', 'like', '%' . $keyword . '%');
      });
       }
       $customers=$customers->paginate(10);
      return view('addcustomer',compact('customers'));
   }
   public function savecustomer(Request $request)
   {
     $customer=new customer();
     $this->validate($request,[
            'name' => 'required|string|max:255',
            'mobile' => 'required|numeric|digits:10|unique:customers',
       ]);
       $customer->name=$request->name;
       $customer->email=$request->email;
       $customer->mobile=$request->mobile;
       $customer->password= "dthseva123";
       $customer->save();
       Session::flash('msg','Customer Added Successfully');
       return back();
   }
   public function updatecustomer(Request $request)
   {
      $customer=customer::find($request->uid);
      $customer->name=$request->name;
      $customer->email=$request->email;
      $customer->mobile=$request->mobile;
      $customer->save();
    Session::flash('msg','Customer Updated Successfully');
    return back();
   }
   public function paymentreport(Request $request){

     $paytmstatus=paytmrecharge::where('status','!=','TXN_FAILURE')->orderBy('id','desc');

       if ($request->has('search') && $request->get('search')!='') {
          $keyword=$request->get('search');
          $paytmstatus=$paytmstatus->where(function ($query) use($keyword) {
          $query->where('id', 'like', '%' . $keyword . '%')
           ->orWhere('orderid', 'like', '%' . $keyword . '%')
           ->orWhere('mid', 'like', '%' . $keyword . '%')
           ->orWhere('txnamount', 'like', '%' . $keyword . '%')
           ->orWhere('paymentmode', 'like', '%' . $keyword . '%')
           ->orWhere('currency', 'like', '%' . $keyword . '%')
           ->orWhere('txndate', 'like', '%' . $keyword . '%')
           ->orWhere('status', 'like', '%' . $keyword . '%')
           ->orWhere('respcode', 'like', '%' . $keyword . '%')
           ->orWhere('respmsg', 'like', '%' . $keyword . '%')
           ->orWhere('gateayname', 'like', '%' . $keyword . '%')
           ->orWhere('banktxnid', 'like', '%' . $keyword . '%')
           ->orWhere('created_at', 'like', '%' . $keyword . '%')
           ->orWhere('txnid', 'like', '%' . $keyword . '%');
      });
       }
   $paytmstatus=$paytmstatus->paginate(10);
    return view('paymentreport',compact('paytmstatus'));
   }
   public function onepayreport(Request $request){
    $statuses=onepayresponse::select('stmsg')->where('stmsg','!=',"")->groupBy('stmsg')->get();
    $onepayresponses=onepayresponse::orderBy('id','desc');

    if ($request->has('search') && $request->get('search')!='') {
          $keyword=$request->get('search');
          $onepayresponses=$onepayresponses->where(function ($query) use($keyword) {
          $query->where('id', 'like', '%' . $keyword . '%')
           ->orWhere('tno', 'like', '%' . $keyword . '%')
           ->orWhere('st', 'like', '%' . $keyword . '%')
           ->orWhere('stmsg', 'like', '%' . $keyword . '%')
           ->orWhere('tid', 'like', '%' . $keyword . '%')
           ->orWhere('oprtid', 'like', '%' . $keyword . '%')
           ->orWhere('mobile', 'like', '%' . $keyword . '%')
           ->orWhere('amount', 'like', '%' . $keyword . '%')
           ->orWhere('prb', 'like', '%' . $keyword . '%')
           ->orWhere('pob', 'like', '%' . $keyword . '%')
           ->orWhere('dp', 'like', '%' . $keyword . '%')
           ->orWhere('created_at', 'like', '%' . $keyword . '%')
           ->orWhere('dr', 'like', '%' . $keyword . '%');
      });
       }
    $onepayresponses=$onepayresponses->paginate(10);
    return view('onepayreport',compact('onepayresponses','statuses'));
   }
   public function walletreport(){
    $customernames=customer::select('name')->where('name','!=',"")->groupBy('name')->get();
    //return $customernames;
    $customers=customer::all();
    return view('walletreport',compact('customers','customernames'));
   }

}
