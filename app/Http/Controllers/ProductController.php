<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;
use App\product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=brand::all();
        return view('addproduct',compact('brands'));
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
           $product = new product();
        
    
   
     
        $product->name = $request['productname'];
        $product->brandid = $request['brandid'];
        $product->cost = $request['cost'];
        $product->promocost = $request['promocost'];
        $product->bookingamount = $request['bookingamount'];
        $product->installamt = $request['installamt'];
        $product->longdescription = $request['fulldescription'];
        $product->shortdescription = $request['shortdescription'];
        $product->cashback_by_type = $request['cashback_by_type'];
        $product->cashback_value = $request['cashback_value'];
          
        $rarefile = $request->file('image1');    
        if($rarefile!=''){
        $raupload = public_path() .'/img/productimage/';
        $rarefilename=time().'.'.$rarefile->getClientOriginalName();
        $success=$rarefile->move($raupload,$rarefilename);
        $product->image1 = $rarefilename;
            }

             $image2 = $request->file('image2');    
        if($image2!=''){
        $raupload = public_path() .'/img/productimage/';
        $image2name=time().'.'.$image2->getClientOriginalName();
        $success=$image2->move($raupload,$image2name);
        $product->image2 = $image2name;
            }

         $image3 = $request->file('image3');    
        if($image3!=''){
        $raupload = public_path() .'/img/productimage/';
        $image3name=time().'.'.$image3->getClientOriginalName();
        $success=$image3->move($raupload,$image3name);
        $product->image3 = $image3name;
            }

         $image4 = $request->file('image4');    
    if($image4!=''){
    $raupload = public_path() .'/img/productimage/';
    $image4name=time().'.'.$image4->getClientOriginalName();
    $success=$image4->move($raupload,$image4name);
    $product->image4 = $image4name;
        }
   
        $product->save();
       
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
        $product=product::find($id);
        $brands=brand::all();

        return view('editproduct',compact('product','brands'));
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
        $product=product::find($id);

         $product->name = $request['productname'];
        $product->brandid = $request['brandid'];
        $product->cost = $request['cost'];
        $product->promocost = $request['promocost'];
        $product->bookingamount = $request['bookingamount'];
        $product->installamt = $request['installamt'];
        $product->longdescription = $request['fulldescription'];
        $product->shortdescription = $request['shortdescription'];
        $product->cashback_by_type = $request['cashback_by_type'];
        $product->cashback_value = $request['cashback_value'];
          
        $rarefile = $request->file('image1');    
        if($rarefile!=''){
        $raupload = public_path() .'/img/productimage/';
        $rarefilename=time().'.'.$rarefile->getClientOriginalName();
        $success=$rarefile->move($raupload,$rarefilename);
        $product->image1 = $rarefilename;
            }

             $image2 = $request->file('image2');    
        if($image2!=''){
        $raupload = public_path() .'/img/productimage/';
        $image2name=time().'.'.$image2->getClientOriginalName();
        $success=$image2->move($raupload,$image2name);
        $product->image2 = $image2name;
            }

         $image3 = $request->file('image3');    
        if($image3!=''){
        $raupload = public_path() .'/img/productimage/';
        $image3name=time().'.'.$image3->getClientOriginalName();
        $success=$image3->move($raupload,$image3name);
        $product->image3 = $image3name;
            }

         $image4 = $request->file('image4');    
    if($image4!=''){
    $raupload = public_path() .'/img/productimage/';
    $image4name=time().'.'.$image4->getClientOriginalName();
    $success=$image4->move($raupload,$image4name);
    $product->image4 = $image4name;
        }
   
        $product->save();
       
    return redirect('/psetup/viewallproduct');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=product::find($id);
        $product->delete();

        return back();
    }
    public function viewallproduct()
    {
        $products=product::select('products.*','brands.brandname')
        ->leftJoin('brands','products.brandid','=','brands.id')
        ->groupBy('products.id')
        ->paginate(10);

        return view('viewallproduct',compact('products'));
    }
}
