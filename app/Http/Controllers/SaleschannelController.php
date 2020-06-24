<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\saleschannel;
use App\brand;
use App\channel;

class SaleschannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands=brand::all();
        $channels=channel::all();
        $saleschannels=saleschannel::select('brands.brandname','channels.channelname','saleschannels.*')
        ->leftJoin('brands','saleschannels.brand','=','brands.id')
        ->leftJoin('channels','saleschannels.channelid','=','channels.id')
        ->paginate(7);
        return view('addsaleschannel',compact('brands','channels','saleschannels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saleschannel=new saleschannel();
        $saleschannel->brand=$request->brand;
        $saleschannel->channelid=$request->channelid;
        $saleschannel->channelcost=$request->channelcost;

        $saleschannel->save();

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
        $saleschannel=saleschannel::find($id);
        $brands=brand::all();
        $channels=channel::all();
        
        return view('editsaleschannel',compact('saleschannel','brands','channels'));

        
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
        $saleschannel=saleschannel::find($id);

         $saleschannel->brand=$request->brand;
        $saleschannel->channelid=$request->channelid;
        $saleschannel->channelcost=$request->channelcost;

        $saleschannel->save();


        return redirect('/psetup/salechannels');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $saleschannel=saleschannel::find($id);
        $saleschannel->delete();


        return back();
    }
    public function viewallsalechannels()
    {

    }
}
