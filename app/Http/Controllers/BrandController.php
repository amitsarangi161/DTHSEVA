<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=brand::paginate(10);
        return view('addbrands',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brand=new brand();
        $brand->brandname=$request->brandname;
        $brand->recharge_code=$request->recharge_code;
        $brand->cashback_percent=$request->cashback_percent;
        $rarefile = $request->file('brandlogo');
        if($rarefile!='')
        {
         $u=time().uniqid(rand());
        $raupload ="img/brandlogo";
        $uplogoimg=$u.$rarefile->getClientOriginalName();
        $success=$rarefile->move($raupload,$uplogoimg);
        $brand->brandlogo = $uplogoimg;
        }
        $brand->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand=brand::find($id);

        return view('editbrands',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand=brand::find($id);
         $brand->brandname=$request->brandname;
         $brand->recharge_code=$request->recharge_code;
          $brand->cashback_percent=$request->cashback_percent;
        $rarefile = $request->file('brandlogo');
        if($rarefile!='')
        {
         $u=time().uniqid(rand());
        $raupload ="img/brandlogo";
        $uplogoimg=$u.$rarefile->getClientOriginalName();
        $success=$rarefile->move($raupload,$uplogoimg);
        $brand->brandlogo = $uplogoimg;
        }
        $brand->save();
        return redirect('/msetup/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand=brand::find($id);

        $brand->delete();
        return back();

    }
}
