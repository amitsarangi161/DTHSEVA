@extends('layouts.app')

@section('content')
<style type="text/css">
.channels {
    position: relative;
    float: left;
    margin: 6px;
}

.channels img {

    box-shadow: 2px 2px 23px -5px black;

}


</style>

<div class="row">
<div class="col-md-7">
	<div><select class="form-control" onchange="loadChannel(this.value)" id="selectedchannel">
		<option>SELECT A CHANNEL</option>
		@foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->categoryname}}</option>

		@endforeach
	</select></div>
	<div id="channelsload">








     </div>

</div>
<form action="/updatepackage/{{$package->id}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}

<div class="col-md-5">
	<div style="height:400px; width: 100%; overflow: scroll; background: #fff; padding: 0px;">
		<div>
	<table class="table table-responsive table-bordered table-striped" id="tableHtml">
		 <thead class="thead-inverse">
			<th>CHANNEL ID</th>
			<th>CHANNEL CATEGORY</th>
			<th>CHANNEL NAME</th>
		</thead>
		<tbody class="wrapper-field">
			@foreach($packagechannels as $ch)
			@php
              $charr[]=$ch->channelid;
			@endphp
                <tr>
                 <td>{{$ch->channelid}}<input type="hidden" name="channelid[]" value="{{$ch->channelid}}"></td>
                 <td>{{$ch->categoryname}}</td>
                 <td>{{$ch->channelname}}</td>
                 <td><button type='button' id='rmv_{{$ch->channelid}}' title="{{$ch->channelid}}"  class='remove_field'  style='color: white;background-color: red;'>X</button></td>
                

               <tr>
			@endforeach
			
		</tbody>
	</table>

</div>




  </div>
<div>
	<div>
		<select name="brand" class="form-control" required="">
			@foreach($brands as $brand)

               <option value="{{$brand->id}}"{{$package->brand==$brand->id ? 'selected="selected"':''}}>{{$brand->brandname}}</option>
			@endforeach
		</select>
	</div>
<div>
	<input type="text" name="pname" value="{{$package->packagename}}" class="form-control">
</div>
<div>
	<input type="number" name="pcost" value="{{$package->packagecost}}" class="form-control">
</div>
<div>
	<textarea name="pdesc" placeholder="PACKAGE DESCRIPTION" class="form-control">{{$package->packagedescription}}</textarea> 
</div>
<div>
	
	<input type="file"  name="packageimage" onchange="readURL(this);">

	<img style="height:70px;width:95px;"  alt="no image" src="{{ asset('/img/packageimage/'.$package->packageimage)}}" id="imgshow">
</div>
 <button class='btn btn-success form-control' type='submit' id="sub" >Create Package</button>

 
              <input type="hidden" value={{ Session::token() }} name="_token">  
</div>
</form>

<script type="text/javascript">

	var inputValue=new Array();
	
	<?php foreach($charr as $key => $val){ ?>
        inputValue.push('<?php echo $val; ?>');
    <?php } ?>
    console.log(inputValue);
	function selectchannel(id,ttl)
	{
 
	var k=inputValue.indexOf(id);
	   
		
        
        if(k=='-1')

        {

        inputValue.push(id);
		var channelcat=jQuery("option:selected",'#selectedchannel').text();

		var x="<tr><td>"+id+"<input type='hidden' name='channelid[]' value='"+id+"'>"+"</td>"+
		"<td>"+channelcat+"</td>"+
		"<td>"+ttl+"</td><td><button type='button' id='rmv_"+id+"' title="+id+"  class='remove_field'  style='color: white;background-color: red;'>X</button></td></tr>";
		$(".wrapper-field").prepend(x);
		//$("#btn_"+id+"").hide();
	    }
	    else
	    {
	    	alert("channel already added")
	    }
	}


$(".wrapper-field").on("click",".remove_field", function(e){ //user click on remove text
e.preventDefault();
$(this).parent('td').parent('tr').remove(); 
$("."+this.id).show();


var l=inputValue.indexOf(this.title);

if (l > -1) {
  inputValue.splice(l, 1);
}





});   



function loadChannel(value)
{
	
          $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
        });

           $.ajax({
               type:'POST',
              
               url:'{{url("/loadChannel")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",
                      channelid: value
                     },

               success:function(data) { 
               	$("#channelsload").empty();
                  $.each(data,function(key,value){

                       var x='<div  id="btn_'+value.id+'" class="channels rmv_'+value.id+'"><div id="'+value.id+'" title="'+value.channelname+'" onclick="selectchannel(this.id,this.title)"><img height="100" width="100" src="../../../img/channellogo/'+value.channellogo+'" alt="channellogo" ></div><div style="text-align: center;">'+value.channelname+'</div></div>';
                      	$("#channelsload").append(x);

                  });

                  
                 
                }
              });

}  
</script>
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