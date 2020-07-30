@extends('layouts.app')
@section('content')

<table class="table">
	<tr class="bg-blue">
		<td class="text-center">VIEW ALL ASSIGNED CUSTOMERS</td>
	</tr>
	
</table>
<div class="container-fluid">

	@foreach(array_chunk($finalsubadminsarray, 3) as $chunk)
	<div class="row">
      @foreach($chunk as $data)
        <div class="col-md-4">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title" class="text-center" style="text-transform: capitalize;">{{$data['subadminname']}}</h3>

              
            </div>
           
            <div class="box-body" style="">
            	@foreach($data['customers'] as $customer)
            	<ul>
            		<li id="li{{$customer['unhid']}}" style="text-transform: capitalize;font-weight: bold;">{{$customer['name']}}/{{$customer['mobile']}}<i class="fa fa-trash-o pull-right" onclick="removethisuser('{{$customer["unhid"]}}');"  style="font-size:15px;color:red;cursor: pointer;"></i></li>
            	</ul>
            	@endforeach
            </div>
            
          </div>
         
        </div>
        @endforeach
       
      
       
      </div>
	   @endforeach
</div>

<script type="text/javascript">
	function removethisuser(unhid)
	{

	   var question=confirm("Do you Want to Delete this Customer?");
       if(question)
       {
       	    if(unhid!='')
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
                      id:unhid

                     },

               success:function(data) {         
                      
        var liid="#li"+unhid;

        $(liid).remove();
                }
              });



    }
   

       }
        


	}
</script>
@endsection