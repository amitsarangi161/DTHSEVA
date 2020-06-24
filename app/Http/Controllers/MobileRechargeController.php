<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobileoperator;

class MobileRechargeController extends Controller
{

   

	public function updateoperator(Request $request,$id)
	{
         $operator=Mobileoperator::find($id);
        $operator->operatorname=$request->operatorname;
        $operator->recharge_code=$request->recharge_code;
        $operator->cashback_percent=$request->cashback_percent;
        $rarefile = $request->file('brandlogo');
        if($rarefile!='')
        {
         $u=time().uniqid(rand());
        $raupload ="img/brandlogo";
        $uplogoimg=$u.$rarefile->getClientOriginalName();
        $success=$rarefile->move($raupload,$uplogoimg);
        $operator->brandlogo = $uplogoimg;
        }
        $operator->save();
        return redirect('/msetup/mobileoperators');
	}

	public function editoperators($id)
	{
		  $operator=Mobileoperator::find($id);

		  return view('editoperators',compact('operator'));
	}
    public function mobileoperators()
    {
    	  $operators=Mobileoperator::all();
          return view('mobileoperators',compact('operators'));
    }

    public function saveoperators(Request $request)
    {
    	$operator=new Mobileoperator();
        $operator->operatorname=$request->operatorname;
        $operator->recharge_code=$request->recharge_code;
        $operator->cashback_percent=$request->cashback_percent;
        $rarefile = $request->file('brandlogo');
        if($rarefile!='')
        {
         $u=time().uniqid(rand());
        $raupload ="img/brandlogo";
        $uplogoimg=$u.$rarefile->getClientOriginalName();
        $success=$rarefile->move($raupload,$uplogoimg);
        $operator->brandlogo = $uplogoimg;
        }
        $operator->save();
        return back();
    }
}
