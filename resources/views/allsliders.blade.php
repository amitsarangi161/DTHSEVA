@extends('layouts.app')
@section('content')
<a href="/cms/sliders" class="btn btn-primary">Add New Slider</a>
<table class="table table-striped table-bordered table-hover table-responsive table-compact">
	<thead class="bg-navy">
        <tr>
        	<th>Id</th>
        	<th>Slider Title</th>
        	<th>Slider Descriptions</th>
            
        	<th>Slider Image</th>
        	<th>Edit</th>
        	<th>Delete</th>
        </tr>
	</thead>
<tbody>
@foreach($sliders as $slider)
<tr>
	<td>{{$slider->id}}</td>
	<td>{{$slider->title}}</td>
	<td>{{$slider->description}}</td>
    
	<td><img style="height:70px;width:95px;" src="{{ asset('/img/sliderimage/'.$slider->image )}}"></td> 
	<td><a href="/cms/sliders/{{$slider->id}}/edit" class="btn btn-primary">EDIT</a></td>
    <td>
    	<form action="/cms/sliders/{{$slider->id}}" method="POST">
    		{{csrf_field()}}
    		{{method_field('DELETE')}}
    	<button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete this details ?');">DELETE</button>
    	</form>
    </td>
</tr>
  
{{$sliders->links()}}
@endforeach
	
	
</tbody>
</table>



@endsection