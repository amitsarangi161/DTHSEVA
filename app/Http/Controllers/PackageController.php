<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\package;
use App\packagechannel;
use App\channel;
use App\brand;

class PackageController extends Controller
{
     public function packagecreate()
    {
        $categories=category::all();

        $brands=brand::all();
        
        return view('packagecreation',compact('categories','brands'));
    }


    public function savepackage(Request $request)
    {  
      

    	$package=new package();
        $package->brand=$request->brand;
    	$package->packagename=$request->pname;
    	$package->packagecost=$request->pcost;
    	$package->packagedescription=$request->pdesc;
        $rarefile = $request->file('packageimage');
        
        if($rarefile!='')
        {
             $u=time().uniqid(rand());
        $raupload ="img/packageimage";
        $uplogoimg=$u.$rarefile->getClientOriginalName();
        $success=$rarefile->move($raupload,$uplogoimg);
        $package->packageimage = $uplogoimg;
        }

    	$package->save();

    	$packageid=$package->id;
         

         $channelid=$request->channelid;

         foreach ($channelid as $key => $id) {

         	$count=packagechannel::where('packageid',$packageid)
         	       ->where('channelid',$id)
         	       ->count();
         	if($count==0)
         	{
         		$packagechannel=new packagechannel();
         	    $packagechannel->packageid=$packageid;
         	    $packagechannel->channelid=$id;
         	    $packagechannel->save();
         	}
         	
         }
    	
       return back();

    }
    public function viewallPackages()
    {
    	$packages=package::select('packages.*','brands.brandname')
        ->leftJoin('brands','packages.brand','=','brands.id')
        ->paginate(10);

    	return view('viewallpackages',compact('packages'));
    }
    public function deletepackage($id)
    {
    	package::find($id)->delete();
    	packagechannel::where('packageid',$id)->delete();
    	return back();
    }
    public function editpackage($id)
    {
    	$package=package::find($id);
    	$packagechannels=packagechannel::select('packagechannels.*','channels.channelname','categories.categoryname')
    	->leftJoin('channels','packagechannels.channelid','=','channels.id')
    	->leftJoin('categories','channels.channelcategory','=','categories.id')
        
    	->where('packageid',$id)
    	->get();
    	$categories=category::all();
        $brands=brand::all();
       
    	return view('editpackage',compact('package','packagechannels','categories','brands'));
    }
    public function updatepackage(Request $request,$id)
    {

        packagechannel::where('packageid',$id)->delete();
    	$package=package::find($id);
        $package->brand=$request->brand;
    	$package->packagename=$request->pname;
    	$package->packagecost=$request->pcost;
    	$package->packagedescription=$request->pdesc;
        $rarefile=$request->file('packageimage');
       
        if($rarefile!='')
        {
        $u=time().uniqid(rand());
        $raupload ="img/packageimage";
        $uplogoimg=$u.$rarefile->getClientOriginalName();
        $success=$rarefile->move($raupload,$uplogoimg);
        $package->packageimage = $uplogoimg;
       


        }
       


        $package->save();
        

        $channelid=$request->channelid;

         foreach ($channelid as $key => $pid) {

         	$count=packagechannel::where('packageid',$id)
         	       ->where('channelid',$pid)
         	       ->count();
         	if($count==0)
         	{
         		$packagechannel=new packagechannel();
         	    $packagechannel->packageid=$id;
         	    $packagechannel->channelid=$pid;
         	    $packagechannel->save();
         	}
         	
         }

        return redirect('/viewallPackages');

    }
}
