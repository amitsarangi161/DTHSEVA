@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<form class="form-horizontal" action="/msetup/channels/ {{$channel->id}}" role="form" method="POST" enctype="multipart/form-data" >
	{{csrf_field()}}
	{{method_field('PUT')}}
	<table class="table table-responsive table-hover table-bordered table-striped" >
		<tr>
			<td colspan="4" class="text-center bg-navy">CHANNEL DETAILS</td>
		</tr>
		<tr>
			<td>CHANNEL NAME<span style="color: red"> *</span></td>
			<td><input type="text" class="form-control" name="channelname" value="{{$channel->channelname}}" required></td>
		</tr>
		<tr>
			<td>CHANNEL  CATEGORY<span style="color: red"> *</span></td>
			<td>
			<select class="form-control" name="channelcategory" required="">
				<option>Select a category</option>
				@foreach($categories as $category)

				<option value="{{$category->id}}" {{$channel->channelcategory==$category->id ? 'selected="selected"':''}}>{{$category->categoryname}}</option>

				@endforeach
			</select>
			</td>
			
		</tr>
		<tr>
			<td>CHANNEL LOGO <span style="color: red"> *</span></td>
			<td><input type="file" name="channellogo" onchange="readURL(this);"></td>
			<td><img style="height:70px;width:95px;"  alt="no image" src="{{ asset('/img/channellogo/'.$channel->channellogo)}}" id="imgshow"></td>
		</tr>
		
		<tr>
			<td></td>
<td colspan="3"><input type="submit" value="Update Channel" class="btn btn-success" style="float: right ;"></td>
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