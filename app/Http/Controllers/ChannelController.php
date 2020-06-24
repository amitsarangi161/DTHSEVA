<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\channel;
use App\category;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels=channel::select('channels.*','categories.categoryname')
        ->leftJoin('categories','channels.channelcategory','=','categories.id')
        ->paginate(10);
        $categories=category::all();
        return view('addchannels',compact('channels','categories'));
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
        $channel=new channel();
        $channel->channelname=$request->channelname;
        $channel->channelcategory=$request->channelcategory;
          $rarefile = $request->file('channellogo');
        if($rarefile!='')
        {
         $u=time().uniqid(rand());
        $raupload ="img/channellogo";
        $uplogoimg=$u.$rarefile->getClientOriginalName();
        $success=$rarefile->move($raupload,$uplogoimg);
        $channel->channellogo = $uplogoimg;
        }
        $channel->save();
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
        $channel=channel::find($id);
        $categories=category::all();

        return view('editchannels',compact('channel','categories'));
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
        $channel=channel::find($id);
         $channel->channelname=$request->channelname;
         $channel->channelcategory=$request->channelcategory;
          $rarefile = $request->file('channellogo');
        if($rarefile!='')
        {
         $u=time().uniqid(rand());
        $raupload ="img/channellogo";
        $uplogoimg=$u.$rarefile->getClientOriginalName();
        $success=$rarefile->move($raupload,$uplogoimg);
        $channel->channellogo = $uplogoimg;
        }
        $channel->save();

        return redirect('/msetup/channels');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $channel=channel::find($id);
        $channel->delete();

        return back();
    }    


   
}
