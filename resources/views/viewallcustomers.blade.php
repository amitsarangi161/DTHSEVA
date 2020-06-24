@extends('layouts.app')
@section('content')

@if(Session::has('msg'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('msg') }}</p>
@endif
<form action="/sendmsg" method="POST">
	{{csrf_field()}}
<table  class="table table-striped table-bordered table-hover table-responsive table-compact">

	<thead class="bg-navy">
       <tr>
       	<th>ID</th>
       	<th>CUSTOMER NAME</th>
       	<th>EMAIL</th>
       	<th>MOBILE</th>
       	<th>Check All<input style="float: right;" type="checkbox" id="checkAll"></th>

       </tr>

	</thead>
	<tbody>
		@foreach($customers as $customer)
		<tr>
			<td>{{$customer->id}}</td>
			<td>{{$customer->name}}</td>
			<td>{{$customer->email}}</td>
			<td>{{$customer->mobile}}</td>
		    <td class="text-center"><input  type="checkbox" name="customercheck[]"  value="{{$customer->mobile}}"></td> 

		</tr>
		@endforeach
	</tbody>
	<tfoot>
		<tr>
			<td>
			<button type="button" onclick="openmsgmodal();" class="btn btn-info">WRITE A MESSAGE</button></td>
		</tr>
	</tfoot>


</table>
 <div class="modal fade" id="msgmodal" role="dialog">

      
         <div class="container">
         <div class="row ">
           <div class="col-md-6 col-md-offset-3 ">
               <div class="order">
               	<span id="msg1"></span>
          
    <div class="form-group">
        <label class="info-title" for="exampleInputEmail2">ENTER YOUR MESSEGE<span>*</span></label>
        <textarea name="message" class="form-control"></textarea>
      </div>
    <div class="form-group">
    <button class="btn btn-success"  type="submit">SEND</button>
    <button class="btn btn-danger" type="button" data-dismiss="modal">CANCEL</button>
       </div>
           </div>
         </div>
         </div>
     
      </div>
      
      
  </div>
</form>

{{$customers->links()}}
<script type="text/javascript">

  $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });
	
	function openmsgmodal() {
		$("#msgmodal").modal('show');
	}
</script>
@endsection