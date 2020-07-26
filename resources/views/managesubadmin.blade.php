@extends('layouts.app')

@section('content')
   @if(Session::has('msg'))
   <p class="alert alert-info text-center">{{ Session::get('msg') }}</p>
   @endif

   @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div><br />
      @endif
  <form action="/saveuser" method="post">
    {{csrf_field()}}
    <table class="table table-responsive table-hover table-bordered table-striped" >
        <tr>
            <td colspan="4" class="text-center bg-navy">ADD A NEW USER</td>
        </tr>
        <tr>
            <td>FULL NAME<span style="color: red"> *</span></td>
            <td colspan="2"><input type="text" class="form-control" autocomplete="off" name="name" placeholder="ENTER NAME" required></td>
        </tr>
          <tr>
            <td>EMAIL</td>
            <td colspan="2"><input type="email" class="form-control" autocomplete="off" name="email" placeholder="ENTER EMAIL ID" ></td>
          </tr>
          <tr>
            <td>PASSWORD<span style="color: red"> *</span></td>
            <td><input type="text" class="form-control" autocomplete="off" id="pass" name="userpassword" placeholder="ENTER PASSWORD" required></td>
            <td><button type="button" onclick="generatepassword();" class="btn btn-info">Generate a Password</button></td>
          </tr>
          <tr>
              <td>USER TYPE<span style="color: red"> *</span></td>
            <td colspan="2">
              <select name="usertype" class="form-control" required>
                  <option value="">Select</option>
                  <option value="ADMIN">ADMIN</option>
                  <option value="SUB ADMIN">SUB ADMIN</option>
              </select>
            </td>
          </tr>

        
        <tr>
            <td></td>
<td colspan="3"><input type="submit" value="Submit" class="btn btn-success" style="float: right ;"></td>
</tr>
</table>
</form>

@if($users)
<div class="box">
<div class="box-body">
  <div style="overflow-x:auto;">
<table class="table table-responsive table-hover table-bordered table-striped datatable" width="100%">
    <thead>
        <tr class="bg-navy" style="font-size: 10px;">
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>USER TYPE</th>
            <th>EDIT</th>
            <!-- <th>DELETE</th> -->
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
         <tr style="font-size: 12px;">
             <td>{{$user->id}}</td>
             <td>{{$user->name}}</td>
             <td>{{$user->email}}</td>
             <td>{{$user->usertype}}</td>
             <td><button onclick="edituser('{{$user->id}}','{{$user->name}}','{{$user->email}}','{{$user->password}}','{{$user->usertype}}')" class="btn btn-info">EDIT</button></td>

         </tr>

        @endforeach
    </tbody>
</table>
</div>
</div>
</div>
@endif

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><b>EDIT USER</b></h4>
      </div>
      <div class="modal-body">
          <form action="/updateuser" method="post">
    {{csrf_field()}}
    <table class="table table-responsive table-hover table-bordered table-striped" >
        <tr>
            <td colspan="4" class="text-center bg-navy">EDIT USER</td>
        </tr>
        <input type="hidden" name="uid" id="uid">
        <tr>
            <td>FULL NAME<span style="color: red"> *</span></td>
            <td colspan="2"><input type="text" class="form-control" autocomplete="off" id="name" name="name" placeholder="ENTER NAME" required></td>
        </tr>
        
          <tr>
            <td>EMAIL<span style="color: red"> *</span></td>
            <td colspan="2"><input type="email" class="form-control" autocomplete="off" id="email" name="email" placeholder="ENTER EMAIL ID" required></td>

          </tr>
          <tr>
            <td>PASSWORD<span style="color: red"> *</span></td>
            <td><input type="text" class="form-control" autocomplete="off" id="pass1" name="userpassword" placeholder="ENTER PASSWORD" required></td>
            <td><button type="button" onclick="generatepassword1();" class="btn btn-info">Generate a Password</button></td>
          </tr>
        
          <tr>
              <td>USER TYPE<span style="color: red"> *</span></td>
            <td colspan="2">
              <select name="usertype" id="usertype" class="form-control"  required>
                  <option value="">Select</option>
                  <option value="ADMIN">ADMIN</option>
                  <option value="SUB ADMIN">SUB ADMIN</option>
              </select>
            </td>
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


<script type="text/javascript">

	function generatepassword()
    {
          var randPassword = Array(6).fill("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ").map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join('');
          $("#pass").val(randPassword);
    }

        function generatepassword1()
    {
          var randPassword = Array(6).fill("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ").map(function(x) { return x[Math.floor(Math.random() * x.length)] }).join('');
          $("#pass1").val(randPassword);
    }

    function edituser(id,name,email,password,usertype)
    {
        $("#uid").val(id);
        $("#name").val(name);
        $("#email").val(email);
        $("#pass1").val();
        $('#usertype option[value="'+usertype+'"]').attr("selected", "selected");
        $("#myModal").modal('show');

    }
</script>


@endsection