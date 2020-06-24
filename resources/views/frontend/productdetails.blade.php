  @extends('layouts.frontend')
  @section('content')
<style type="text/css">
.tab-content{padding: 10px;
margin-left:10px; }	

</style>


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<!-- <ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Tata SKy</a></li>
				<li class='active'>Dish</li>
			</ul> -->
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<!-- /.sidebar -->
			<div class='col-md-12'>
            <div class="detail-block">
				<div class="row  wow fadeInUp">
                
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
    <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">

            <div class="single-product-gallery-item" id="slide1">
                <a data-lightbox="image-1" data-title="Gallery" href="{{asset('img/productimage/'.$product->image1)}}">
                    <img class="img-responsive" alt="" src="../../assets/images/blank.gif" data-echo="{{asset('img/productimage/'.$product->image1)}}" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide2">
                <a data-lightbox="image-1" data-title="Gallery" href="{{asset('img/productimage/'.$product->image2)}}">
                    <img class="img-responsive" alt="" src="../../assets/images/blank.gif" data-echo="{{asset('img/productimage/'.$product->image2)}}" />
                </a>
            </div><!-- /.single-product-gallery-item -->

            <div class="single-product-gallery-item" id="slide3">
                <a data-lightbox="image-1" data-title="Gallery" href="{{asset('img/productimage/'.$product->image3)}}">
                    <img class="img-responsive" alt="" src="../../assets/images/blank.gif" data-echo="{{asset('img/productimage/'.$product->image3)}}" />
                </a>
            </div><!-- /.single-product-gallery-item -->

        
          

        </div><!-- /.single-product-slider -->


        <div class="single-product-gallery-thumbs gallery-thumbs">

            <div id="owl-single-product-thumbnails">
                <div class="item">
                    <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="1" href="#slide1">
                        <img class="img-responsive" width="85" alt="" src="../../assets/images/blank.gif" data-echo="{{asset('img/productimage/'.$product->image1)}}" />
                    </a>
                </div>
                <div class="item">
                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                        <img class="img-responsive" width="85" alt="" src="../../assets/images/blank.gif" data-echo="{{asset('img/productimage/'.$product->image2)}}"/>
                    </a>
                </div>
                <div class="item">

                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                        <img class="img-responsive" width="85" alt="" src="../../assets/images/blank.gif" data-echo="{{asset('img/productimage/'.$product->image3)}}" />
                    </a>
                </div>
           
            </div><!-- /#owl-single-product-thumbnails -->

            

        </div><!-- /.gallery-thumbs -->

    </div><!-- /.single-product-gallery -->
</div><!-- /.gallery-holder -->        			
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h1 class="name">{{$product->name}}</h1>
							
							<div class="rating-reviews m-t-20">
								<div class="row">
									<div class="col-sm-3">
										<div class="">
											     @php
                                  $img="";
                                  $pid=$product->id;
                                  $r=DB::table('rating')->where('productid',$pid)->pluck('rating')->first();
                                   $count=App\review::where('productid',$pid)->count();
                                  @endphp
                                  @for($i=1; $i<=$r; $i++)
                                  <i class="fa fa-star checked" style="color:#e7b710;"></i>
                                  @endfor
                                  @for($j=$i; $j<=5; $j++)
                                  <i class="fa fa-star" style="color:#c0c0c0;"></i>
                                  @endfor
                                <strong>{{round( $r, 1, PHP_ROUND_HALF_UP)}}</strong>
										</div>
									</div>
									<div class="col-sm-8">
										<div class="reviews">
											<a href="" class="lnk">({{$count}} Reviews)</a>
										</div>
									</div>
								</div><!-- /.row -->		
							</div><!-- /.rating-reviews -->

							<div class="stock-container info-container m-t-10">
								<div class="row">
									<div class="col-sm-2">
										<div class="stock-box">
											<span class="label">Availability :</span>
										</div>	
									</div>
									<div class="col-sm-9">
										<div class="stock-box">
											<span class="value">In Stock</span>
										</div>	
									</div>
								</div><!-- /.row -->	
							</div><!-- /.stock-container -->

							<div class="description-container m-t-20">
								{{$product->shortdescription}}
							</div><!-- /.description-container -->

							<div class="price-container info-container m-t-20">
								<div class="row">
									

									<div class="col-sm-6">
										<div class="price-box">
											<span class="price">INR {{$product->promocost}}</span>
											<span class="price-strike">INR {{$product->cost}}</span>
										</div>
										<span style="color: #751620">+ Installation Charges : {{$product->installamt}}</span>
									</div>

									

								</div><!-- /.row -->
							</div><!-- /.price-container -->

							<div class="quantity-container info-container">
								<div class="row">
									
								

									<div class="col-sm-7">
										<a href="/buynow/{{$product->id}}" class="btn btn-primary form-control"><i class="fa fa-shopping-cart inner-right-vs"></i> BUY NOW</a>
									</div>

									
								</div><!-- /.row -->
							</div><!-- /.quantity-container -->

							

							

							
						</div><!-- /.product-info -->
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
                </div>


				
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-12">
							<div class="description-header">
								<p>DESCRIPTION</p>
								
							</div><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-12">

							<div class="tab-content">
								
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										{!! $product->longdescription !!}
									</div>	
								</div><!-- /.tab-pane -->
							</div>
						</div>

							
						
						</div><!-- /.col -->
					</div><!-- /.row -->
			<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-12">
							<div class="description-header">
								<p>REVIEW</p>
								
							</div><!-- /.nav-tabs #product-tabs -->
						</div>
						

@foreach($reviews as $review)
						<div class="col-sm-12">






							<div class="tab-content">

							<div class="review">
							<div class="avatar" style="float:left;">
									<img class="img img-responsive img-thumbnail" src="{{asset('images/avatar.png')}}">
							</div>
								
								<div id="description" class="tab-pane in active" style="float:left;">
									

									<div class="product-tab">
										<strong>{{$review->name}}</strong>
										
										<p> {{\Carbon\Carbon::createFromTimeStamp(strtotime($review->created_at))->diffForHumans()}}</p>
									</div>	


									<div class="product-tab">
										 @php
                                      $price= $review->price;
                                      $value= $review->value;
                                     $quality= $review->quality;

                                     $r=($price+$value+$quality)/3;

                                     
                                 
                                        @endphp
                                  @for($i=1; $i<=$r; $i++)
                                  <i class="fa fa-star checked" style="color:#e7b710;"></i>
                                  @endfor
                                  @for($j=$i; $j<=5; $j++)
                                  <i class="fa fa-star" style="color:#c0c0c0;"></i>
                                  @endfor
										
									</div>	

									<div class="product-tab">
										<p>{{$review->review}}</p>
									</div>	
								


								</div>

							</div>
							


							</div>
							</div>


@endforeach




							
						
						</div><!-- /.col -->
					</div>



 



			
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
			</div><!-- /.container -->
</div>


  @endsection