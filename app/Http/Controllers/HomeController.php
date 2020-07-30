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
use App\wallet;
use App\User;
use App\rechargeticket;
use App\assigneduser;
use Carbon\Carbon;

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
    public function viewallassignedusers()
    {
         $subadmins=User::where('usertype','SUB ADMIN')->get();
         $finalusershodsarray=array();
         foreach ($subadmins as $key => $subadmin) {
            $customers=assigneduser::select('assignedusers.*','customers.name','customers.mobile','assignedusers.id as unhid')
                ->leftJoin('customers','assignedusers.uid','=','customers.id')
                ->where('adminid',$subadmin->id)
                ->get();
            $finalsubadminsarray[]=[
              'adminid'=>$subadmin->id,
              'subadminname'=>$subadmin->name,
              'customers'=>$customers

            ];
         }
         //return $finalsubadminsarray;
         return view('viewallassignedusers',compact('finalsubadminsarray'));
    }
     public function assigneduser()
   {
    
      $users=User::where('usertype','=','SUB ADMIN')->get();
      $userids=assigneduser::select('uid')
                    ->get();
      $customers=customer::whereNotIn('id',$userids)->get();
      //return $users;
      return view('assigneduser',compact('users','customers'));
   }
    public function managesubadmin()
   {
    
      $users=User::all();
      return view('managesubadmin',compact('users'));
   }

      public function saveuser(Request $request)
   {
      
     $user=new User();
       $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'userpassword' => 'required|min:6',
            'usertype'=>'required|string',
            
       ]);
       $user->name=$request->name;
       $user->email=$request->email;
       $user->usertype=$request->usertype;
       $user->password= bcrypt($request->userpassword);
       $user->save();
       Session::flash('msg','User Added Successfully');
         return back();
   }
   public function updateuser(Request $request)
   {
      
      $user=User::find($request->uid);
      $user->name=$request->name;
       $user->email=$request->email;
       $user->usertype=$request->usertype;
       $user->password= bcrypt($request->userpassword);
       $user->save();
    Session::flash('msg','User Updated Successfully');
    return back();
   }
    public function rechargetickets()
    {
         $tickets=rechargeticket::select('rechargetickets.*','customers.name','customers.mobile')
                ->leftJoin('customers','rechargetickets.user_id','=','customers.id')
                ->paginate(10);

         return view('rechargetickets',compact('tickets'));
    }
    public function index()
    {
        $customers=customer::where('id','>',0)->count();
        $porders=order::where('id','>',0)->count();
        $rorders=rechargeorder::where('id','>',0)->count();
        $rorders=rechargeorder::where('id','>',0)->count();
        $mobrorders=Mobilerechargeorder::where('id','>',0)->count();
        $totalproducts=product::where('id','>',0)->count();
        $faileddthrechargeorders=rechargeorder::where('paymentstatus','PAID')
          ->where('orderstatus', '=', 'FAILED')->count(); 
        $failedmobilerechargeorders=Mobilerechargeorder::where('paymentstatus','PAID')
          ->where('orderstatus', '=', 'FAILED')->count();

        return view('home',compact('customers','porders','rorders','totalproducts','faileddthrechargeorders','failedmobilerechargeorders','mobrorders'));
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

      $data=$request->all();
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
      return view('addcustomer',compact('customers','data'));
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
    $data=$request->all();
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
    return view('paymentreport',compact('paytmstatus','data'));
   }
   public function onepayreport(Request $request){
    $statuses=onepayresponse::select('stmsg')->where('stmsg','!=',"")->groupBy('stmsg')->get();
    $onepayresponses=onepayresponse::orderBy('id','desc');

    if ($request->has('stmsg')&& $request->get('stmsg')!='') {
      
       $onepayresponses=$onepayresponses->where('stmsg',$request->get('stmsg'));
      
    }

    if($request->has('fromdate')&& $request->has('todate')){
       if($request->get('fromdate')!='' &&  $request->get('todate')!='')
       {
          $from=$request->get('fromdate').' 00::00::00';
          $to=$request->get('todate').' 23::59::59';
          $onepayresponses=$onepayresponses->where('created_at','>=',$from)
            ->where('created_at','<=',$to);
       }
    }
    else
    {
        $date=date('Y-m-d');
        $from=$date.' 00::00::00';
          $to=$date.' 23::59::59';
          $onepayresponses=$onepayresponses->where('created_at','>=',$from)
            ->where('created_at','<=',$to);
    }

    

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
    $onepayresponses=$onepayresponses->get();
    return view('onepayreport',compact('onepayresponses','statuses'));
   }
   public function walletreport(Request $request){
    $customernames=customer::all();
    $wallets=array();
    $customers=array();
    $customerwallets=array();
    $data=$request->all();
    if($request->has('name') && $request->get('name')!='')
    {
        
        $wallets=wallet::select('wallets.*','customers.name')
                 ->where('user_id',$request->get('name'))
                 ->leftJoin('customers','wallets.user_id','=','customers.name')
                 ->get();
    }
    else{

       $customers=customer::where('id','>',0);

       if ($request->has('search') && $request->get('search')!='') {
          $keyword=$request->get('search');
           $customers=$customers->where(function ($query) use($keyword) {
          $query->where('id', 'like', '%' . $keyword . '%')
           ->orWhere('name', 'like', '%' . $keyword . '%')
           ->orWhere('mobile', 'like', '%' . $keyword . '%');
      })->orderBy('name','asc')->paginate(15);
       }
       else{
          $customers=$customers->orderBy('name','asc')->paginate(15);
       }
        
      /*  foreach ($customernames as $key => $customer) {
          $w=wallet::select('wallets.*')
                 ->where('user_id',$customer->id)
                 ->get();
          $totalcredit=number_format((float)$w->sum('credit'), 2, '.', '');
          $totaldebit=number_format((float)$w->sum('debit'), 2, '.', '');
          $totalbalance=number_format((float)($w->sum('credit')-$w->sum('debit')), 2, '.', '');
          $customerwallets[]=array('customer'=>$customer,'credit'=>$totalcredit,'debit'=>$totaldebit,'balance'=>$totalbalance);
            
        }*/
        
    }
     $wal=wallet::all();
     $totalcredit=number_format((float)$wal->sum('credit'), 2, '.', '');
     $totaldebit=number_format((float)$wal->sum('debit'), 2, '.', '');
     $totalbalance=number_format((float)($wal->sum('credit')-$wal->sum('debit')), 2, '.', '');
   
    return view('walletreport',compact('customernames','wallets','customerwallets','totalbalance','totalcredit','totaldebit','data','customers'));
   }

}
