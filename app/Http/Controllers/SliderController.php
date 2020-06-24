<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('addsliders');
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
        
        $slider=new slider();
        $slider->title=$request->title;
        $slider->description=$request->description;
        
        
        $rarefile = $request->file('image');
        if($rarefile!='')
        {
             $u=time().uniqid(rand());
        $raupload ="img/sliderimage";
        $uplogoimg=$u.$rarefile->getClientOriginalName();
        $success=$rarefile->move($raupload,$uplogoimg);
        $slider->image = $uplogoimg;
        }
        $slider->save();

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
       
        $slider=slider::find($id);
       
        return view('editsliders',compact('slider'));
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
         $slider=slider::find($id);
          $slider->title=$request->title;
        $slider->description=$request->description;
        $rarefile = $request->file('image');
        if($rarefile!='')
        {
             $u=time().uniqid(rand());
        $raupload ="img/sliderimage";
        $uplogoimg=$u.$rarefile->getClientOriginalName();
        $success=$rarefile->move($raupload,$uplogoimg);
        $slider->image = $uplogoimg;
        }
        $slider->save();
        return redirect('/cms/allsliders');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $slider=slider::find($id);
        $slider->delete();
        return back();
    }
    public function allsliders()
    {
        $sliders=slider::paginate(5);
        return view('allsliders',compact('sliders'));
    }
}
