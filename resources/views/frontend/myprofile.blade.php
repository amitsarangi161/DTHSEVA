@extends('layouts.frontend')
@section('content')
@section('sidemenucontent')
<div class="row description-header text-center" style="background-color: gray;"><span>MY PROFILE</span></div>

<div class="sign-in-page">
			<div class="row">

<div class="col-md-12 col-sm-12 create-new-account">
	<div class="row">
	<h4 class="checkout-subtitle">MY PROFILE</h4>
	  <h4 class="pull-right" ><a href="javascript:void(0)"><span class="label label-warning" onclick='updatepass()'>Change Password?</span></a></h4s>
	</div>
	<form action="/updateprofile/{{Session::get('userid')['uid']}}" method="POST">
		{{csrf_field()}}
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Mobile No<span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{Session::get('userid')['mobile']}}" disabled="">
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
		    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" value="{{Session::get('userid')['name']}}" name="name">
		</div>
		<div class="form-group">
	    	<label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
	    	<input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2" value="{{Session::get('userid')['email']}}" name="email">
	  	</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update</button>
	</form>
	
	
</div>	
<!-- create a new account -->			</div><!-- /.row -->
		</div>



@endsection
@include('layouts.sidemenu')
@endsection