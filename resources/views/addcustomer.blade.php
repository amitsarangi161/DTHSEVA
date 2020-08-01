@extends('layouts.app')
@section('content')
 @if(Session::has('msg'))
   <p class="alert alert-success text-center successmsg">{{ Session::get('msg') }}</p>
   @endif

   @if ($errors->any())
          <div class="alert alert-danger errormessage">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div><br />
      @endif


  <form action="/savecustomer" method="post">
    {{csrf_field()}}
    <table class="table table-responsive table-hover table-bordered table-striped" >
        <tr>
            <td colspan="4" class="text-center bg-navy">ADD A NEW CUSTOMER</td>
        </tr>
        <tr>
            <td>CUSTOMER NAME<span style="color: red"> *</span></td>
            <td colspan="2"><input type="text" class="form-control" autocomplete="off" name="name" placeholder="ENTER CUSTOMER NAME" required></td>
        </tr>
          <tr>
            <td>EMAIL</td>
            <td colspan="2"><input type="email" class="form-control" required="" autocomplete="off" name="email" placeholder="ENTER EMAIL ID" ></td>

          </tr>
          <tr>
            <td>MOBILE</td>
            <td colspan="2"><input type="number" class="form-control" autocomplete="off" name="mobile" placeholder="ENTER MOBILE" required=""></td>
          </tr>       
        <tr>
            <td></td>
<td colspan="3"><input type="submit" value="Submit" class="btn btn-success" style="float: right ;"></td>
</tr>
</table>
</form>

  <table class="table">
	<form action="/customers/addcustomer" method="get">
	<tr>
		<td><strong>Enter search keyword</strong></td>

		<td>
			<input type="text" name="search" placeholder="Enter a Search Keyword" value="{{Request::get('search')}}" class="form-control" required="">
		</td>
		<td><button type="submit" class="btn btn-success">Filter</button></td>
		@if(Request::has('search'))
        <td><a href="/customers/addcustomer" class="btn btn-danger">Clear</a></td>
		@endif

	</tr>
	</form>
</table>

<div class="box">
<div class="box-body">
  <div style="overflow-x:auto;">
<table class="table table-responsive table-hover table-bordered table-striped datatable1" width="100%">
    <thead>
        <tr class="bg-navy" style="font-size: 10px;">
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>MOBILE</th>
            <th>EDIT</th>
            <!-- <th>DELETE</th> -->
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
         <tr style="font-size: 12px;">
             <td>{{$customer->id}}</td>
             <td>{{$customer->name}}</td>
             <td>{{$customer->email}}</td>
             <td>{{$customer->mobile}}</td>
             <td><button onclick="editcustomer('{{$customer->id}}','{{$customer->name}}','{{$customer->email}}','{{$customer->mobile}}')" class="btn btn-info">EDIT</button></td>
         </tr>

        @endforeach
    </tbody>
</table>
</div>
{{$customers->appends($data)->links()}}
</div>

</div>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>EDIT CUSTOMER</b></h4>
      </div>
      <div class="modal-body">
          <form action="/updatecustomer" method="post">
    	{{csrf_field()}}
    <table class="table table-responsive table-hover table-bordered table-striped" >
        <tr>
            <td colspan="4" class="text-center bg-navy">EDIT CUSTOMER</td>
        </tr>
        <input type="hidden" name="uid" id="uid">
        <tr>
            <td>CUSTOMER NAME<span style="color: red"> *</span></td>
            <td colspan="2"><input type="text" class="form-control" autocomplete="off" id="name" name="name" placeholder="ENTER NAME" required></td>
        </tr>
          <tr>
            <td>EMAIL</td>
            <td colspan="2"><input type="email" class="form-control" autocomplete="off" id="email" name="email" placeholder="ENTER EMAIL ID"></td>

          </tr>
          <tr>
            <td>MOBILE</td>
            <td colspan="2"><input type="number" class="form-control" autocomplete="off" id="mobile" name="mobile" placeholder="ENTER MOBILE" ></td>
          </tr>
      
        <tr>
            <td></td>
<td colspan="3"><input type="submit" value="Submit" class="btn btn-success" style="float: right ;"></td>
</tr>
</table>
</form>

  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>

	 function editcustomer(id,name,email,mobile)
    {

        $("#uid").val(id);
        $("#name").val(name);
        $("#email").val(email);
        $("#mobile").val(mobile);
        $("#myModal").modal('show');

    }

</script>


@endsection