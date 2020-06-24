@extends('layouts.app')
@section('content')

<style type="text/css">
	.thumb-image
	{
		height: 100px;
		width: 100px;
	}
</style>


<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/offerimage">
{{ csrf_field() }}
	<table class="table table-responsive table-hover table-bordered table-striped" >
		<tr>
			<td colspan="4" class="text-center bg-navy">ADD OFFER IMAGE</td>
		</tr>
		
			<tr>
		<td><div class="form-group">
                      <label class="col-sm-2 control-label">OFFER IMAGE</label>
                      <div class="col-sm-8">
                        <input name="image" type="file" onchange="readURL(this);">
                        <p class="help-block">Upload .png, .jpg or .jpeg image files only</p>
                      </div>
                    </div>
          </td>
       

            <td colspan="8"><img style="height:70px;width:95px;" alt="noimage"  id="imgshow"></td>
          </tr>
		
             
            
			
						  
</table>
		<tr>
			<td colspan="4">
				<a href="/" class="btn btn-danger" style="float: left;"  >Cancel</a>
				<button class="btn btn-success" style="float: right ;" type="submit">ADD IMAGE</button>
			</td>
		</tr>
		

	</table>
</form>


<table  class="table table-striped table-bordered table-hover table-responsive table-compact">

	<thead class="bg-navy">
		<tr>
			
			<th class="text-center">OFFER IMAGE</th>
			
		</tr>
    </thead>
    <tbody>
   <tr>
       <td><img style="height:200px;width:200px;" src="{{ asset('/img/offer.jpg')}}"></td>
   </tr>
    	
    </tbody>


	
</table>



<script type="text/javascript">

function readURL(input) {
		

       if (input.files && input.files[0]) {
            var reader = new FileReader();
              
            reader.onload = function (e) {
                $('#imgshow')
                    .attr('src', e.target.result)
                    .width(95)
                    .height(70);
					
            };

            reader.readAsDataURL(input.files[0]);

        }
    }




</script>



@endsection


