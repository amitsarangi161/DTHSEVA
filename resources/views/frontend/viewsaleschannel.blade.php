  @extends('layouts.frontend')
  @section('content')


<div class="body-content">
	<div class="container">
		<div class="checkout-box faq-page">
			<div class="row">
				<div class="col-md-12">
					<h2 class="heading-title">ALL CHANNELS</h2>
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->

<!-- checkout-step-01  -->
					    <!-- checkout-step-02  -->
					  	
					  	<!-- checkout-step-02  -->

						<!-- checkout-step-03  -->
					  	
						<!-- checkout-step-04  -->

						<!-- checkout-step-05  -->
			@php
			$co=1;
			@endphp
          @foreach($channelinfo as $p)
					  	<div class="panel panel-default checkout-step-{{$co}}">
						    <div class="panel-heading" style="padding: 5px;">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapse{{$co}}">
						        	<span>{{$co}}</span>{{$p['category']}}</a>
						      </h4>
						    </div>
						    @if($co==1)
						    <div id="collapse{{$co}}" class="panel-collapse collapse in">
						    @else
						    <div id="collapse{{$co}}" class="panel-collapse collapse ">
						    @endif
		<div class="panel-body">

		@foreach($p['channel'] as $channel)				      


<div class="channels">
	<img style="height:70px;width:95px;"  alt="no image" src="{{ asset('/img/channellogo/'.$channel->channellogo )}}" id="imgshow">
	<h3 class="name" style="font-size: 15px;"><a href="#">{{$channel->channelname}}</a></h3>
	<strong>RS.{{$channel->channelcost}}</strong>
</div>

@endforeach
						      </div>
						    </div>
					    </div>
					    <!-- checkout-step-05  -->
@php
$co++;
@endphp
	@endforeach					
					  	
					
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->
@endsection