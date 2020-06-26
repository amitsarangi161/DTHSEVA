@extends('layouts.app')

@section('content')

<form class="form-horizontal" action="/updateoperator/{{$operator->id}}" role="form" method="POST" enctype="multipart/form-data" >
	{{csrf_field()}}

	<table class="table table-responsive table-hover table-bordered table-striped" >
		<tr>
			<td>OPERATOR NAME<span style="color: red"> *</span></td>
			<td><input type="text" class="form-control" name="operatorname" value="{{$operator->operatorname}}"></td>
		</tr>
		<tr>
			<td>PREPAID RECHARGE CODE<span style="color: red"> *</span></td>
			<td><input type="text" class="form-control" name="recharge_code" placeholder="ENTER RECHARGE CODE" required value="{{$operator->recharge_code}}"></td>
		</tr>
		<tr>
			<td>POSTPAID RECHARGE CODE<span style="color: red"> *</span></td>
			<td><input type="text" class="form-control" name="postpaid_recharge_code" placeholder="ENTER RECHARGE CODE" required value="{{$operator->postpaid_recharge_code}}"></td>
		</tr>
		<tr>
			<td>CASH BACK(IN %)<span style="color: red"> *</span></td>
			<td><input type="text" value="{{$operator->cashback_percent}}" class="form-control" name="cashback_percent" placeholder="ENTER CASHBACK(IN %)" required></td>
		</tr>
		<tr>
			<td>LOGO <span style="color: red"> *</span></td>
			<td><input type="file" name="brandlogo" onchange="readURL(this);"></td>
			<td><img style="height:70px;width:95px;" id="imgshow" src="{{ asset('/img/brandlogo/'.$operator->brandlogo )}}"></td>
		</tr>
		<tr>
			
			<td><input type="submit" value="Submit" class="btn btn-success" style="float: right ;"></td>
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