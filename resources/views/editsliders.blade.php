@extends('layouts.app')
@section('content')

<style type="text/css">
	.thumb-image
	{
		height: 100px;
		width: 100px;
	}
</style>

<a href="/cms/allsliders" class="btn btn-primary">All Sliders</a>
<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="/cms/sliders/ {{ $slider->id}} ">

 {{csrf_field()}} 
 {{method_field('PUT')}} 

	<table class="table table-responsive table-hover table-bordered table-striped" >
		<tr>
			<td colspan="4" class="text-center bg-navy">ADD SLIDERS</td>
		</tr>
		<tr>
			<td>SLIDER TITLE<span style="color: red"> *</span></td>
			<td><input  class="form-control" value="{{$slider->title}}" name="title" placeholder="Enter Slider Title Here" required></td>
		</tr>
		<tr>
			<td>SLIDER DESCRIPTION<span style="color: red"> *</span></td>
			<td><input  class="form-control" value="{{$slider->description}}" name="description" placeholder="Enter Slider Description Here" required></td>
		</tr>
		
		
			<tr>
		<td><div class="form-group">
                      <label class="col-sm-2 control-label">Cover Image</label>
                      <div class="col-sm-8">
                        <input name="image" type="file" onchange="readURL(this);">
                        <p class="help-block">Upload .png, .jpg or .jpeg image files only</p>
                      </div>
                    </div>
          </td>
       

            <td colspan="8"><img style="height:70px;width:95px;"  src="{{ asset('/img/sliderimage/'.$slider->image )}} "  id="imgshow"></td>
          </tr>
	
             
            
			
						  
</table>
		<tr>
			<td colspan="4">
				<button class="btn btn-danger" style="float: left;" type="button" >Cancel</button>
				<button class="btn btn-success" style="float: right ;" type="submit">Update Slider</button>
			</td>
		</tr>
		

	</table>
</form>



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


