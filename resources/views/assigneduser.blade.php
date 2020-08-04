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
<table class="table table-responsive table-hover table-bordered table-striped" >
        <tr>
            <td colspan="4" class="text-center bg-navy">Assigned User</td>
        </tr>
        <tr>
            <td><strong>SELECT SUB ADMIN</strong><span style="color: red"> *</span></td>
            <td>
              <select id="subadmin" class="form-control select2" onchange="fetchuserssubadmin();">
                        <option value="">Select a sub admin</option>
                @foreach($users as $user)

                       <option value="{{$user->id}}">{{$user->name}}</option>

                       
                @endforeach
                
              </select>

            </td>
          
        </tr>
   
</table>

<table id="table" class="table table-responsive table-hover table-bordered table-striped" style="display: none;">
  <thead>
    <tr class="bg-primary">
      <td colspan="5" class="text-center"><button onclick="addnewcustomer();" class="btn btn-warning">ADD A NEW CUSTOMER</button></td>
    </tr>
  </thead>
  <thead>
    <tr class="bg-navy">
      <td>ID</td>
      <td>CUSTOMER NAME/MOBILE</td>
      <td>REMOVE</td>

    </tr>
  </thead>
  <tbody id="tbody">
    
  </tbody>
  
</table>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">ADD NEW CUSTOMER</h4>
      </div>
      <div class="modal-body">
       <table class="table">
        <tr>
          <td><strong>SELECT A CUSTOMER</strong></td>
          <td class="well">
            <select class="form-control select2" multiple="multiple" style="width: 200px;" id="customer">
              <option value="">Select a customer</option>
              @foreach($customers as $customer)
               <option value="{{$customer->id}}">{{$customer->name}}/{{$customer->mobile}}</option>
              @endforeach
              
            </select>
        </div>
          <td>
            <button class="btn btn-success" onclick="newuseraddcustomer()" type="button">ADD</button>
          </td>

        </tr>
       </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script>
  function fetchuserssubadmin()
  {

   var adminid=$("#subadmin").val();
    if(adminid!='')
    {

    
                $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
        });
              

              $.ajax({
               type:'POST',
              
               url:'{{url("/ajaxgetusersubadmin")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",

                      adminid:adminid

                     },

               success:function(data) { 
                         $("#tbody").empty();
                         //alert(data);
                        $("#table").show();
                     $.each(data,function(key,value){
                        $("#tbody").append('<tr><td>'+value.uid+'</td><td>'+value.name+'/'+value.mobile+'</td>'+'</td><td class="text-center"><button type="button" class="btn btn-danger" onclick="removecustomer('+value.id+');">X</button></td></tr>');

                     });
                 
                }
              });



    }
    else
    {
        $("#table").show();
    }

  }

  function addnewcustomer()
{

    $("#myModal").modal('show');
}
function newuseraddcustomer()
{
   var adminid=$("#subadmin").val();
   //var uid=$("#customer").val();
   var uid = [];
        $('#customer option').each(function(i) {
                if (this.selected == true) {
                        uid.push(this.value);
                }
        });
    if(adminid!='' && uid!=null)
    {

      
                $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
        });
              

              $.ajax({
               type:'POST',
              
               url:'{{url("/ajaxnewuseraddcustomer")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",

                      adminid:adminid,
                      uid:uid

                     },

               success:function(data) { 
                         
                      $("#myModal").modal('hide');
                      refreshusers();
                      fetchuserssubadmin();
                }
              });



    }
    else
    {
          $("#myModal").modal('close');
    }
   

}

function refreshusers()
{
  var id=3;
                $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
        });
              

              $.ajax({
               type:'POST',
              
               url:'{{url("/ajaxrefreshcustomers")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",
                      id:id

                     },

               success:function(data) { 
                    $("#customer").empty();
                     $.each(data,function(key,value){
                        $("#customer").append('<option value="'+value.id+'">'+value.name+'</option>');
                     });
                }
              });
}
function removecustomer(id)
{
   if(id!='')
    {

    
                $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
        });
              

              $.ajax({
               type:'POST',
              
               url:'{{url("/ajaxremovecustomer")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",
                      id:id

                     },

               success:function(data) { 
                         
                        $("#myModal").modal('hide');
                      refreshusers();
                      fetchuserssubadmin();

                }
              });



    }
   
}
</script>
@endsection