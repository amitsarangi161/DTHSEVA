  @extends('layouts.frontend')
  @section('content')
<style type="text/css">
  .nav-link span i{
    font-size: 30px;
}
.fasize{
  font-size: 27px;
  font-weight: 800;
  color: #c6c6c6;
}
.textr {
    color: 
    rgba(255,255,255,0.8);
    font-weight: bold;
    font-size: 13px;
    margin: 0px;
    letter-spacing: 0.5px;
    font-family: 'Open Sans', sans-serif;
    margin-top: 5px;
}
@media (min-width: 375px) {
 .textr {
    font-size: 8px;
}
}
</style>
<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
            <div class="info-boxes wow fadeInUp" style="margin-bottom: 5px;">
          <div class="info-boxes-inner" style="background-color: #0c2f55;">
            <div class="row">
              <a href="/recharge/mobilerecharge">
              <div class="col-md-6 col-sm-4 col-lg-4 col-xs-4">
                <div class="info-box" style="height: 80px;">
                  <div class="row">
                    <div class="col-xs-12">
                     <span><i class="fa fa-mobile fasize"></i></span>
                     <h6 class="textr">Mobile Recharge</h6>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              <!-- .col -->
              <a href="/recharge/recharge">
              <div class="hidden-md col-sm-4 col-lg-4 col-xs-4">
                <div class="info-box" style="height: 80px;">
                  <div class="row">
                    <div class="col-xs-12">
                    <span><i class="fa fa-television fasize"></i></span>
                    <h6 class="textr">DTH Recharge</h6>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              <!-- .col -->
              <a href="javascript:void(0)">
              <div class="col-md-6 col-sm-4 col-lg-4 col-xs-4">
                <div class="info-box" style="height: 80px;">
                  <div class="row">
                    <div class="col-xs-12">
                    <span><i class="fa fa-lightbulb-o fasize"></i></span>
                    <h6 class="textr">Electricity</h6>
                    </div>
                  </div>
                </div>
              </div>
              </a>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
    <div class="row"> 
      <!-- ============================================== SIDEBAR ============================================== -->
     
      
      <!-- ============================================== CONTENT ============================================== -->
      <div class="col-xs-12 col-sm-12 col-md-12 homebanner-holder"> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
       <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    @php
    $x=0;
    $y=0;
    @endphp
    
    @foreach($sliders as $slider)

 @if($x==0)
     <li data-target="#myCarousel" data-slide-to="{{$x}}" class="active"></li>
   @else
    <li data-target="#myCarousel" data-slide-to="{{$x}}" ></li>
    @endif
@php
    $x++;
    @endphp

    @endforeach
    
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    @foreach($sliders as $slider)

 @if($y==0)


  <div class="item active">
  
<img class="main-slider" src="{{ asset('/img/sliderimage/'.$slider->image )}}" alt="New York">

    </div>
@else
    <div class="item">
      <img class="main-slider" src="{{ asset('/img/sliderimage/'.$slider->image )}}" alt="Chicago">
    </div>

    @endif
@php
    $y++;
    @endphp

    @endforeach


  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        <!-- ========================================= SECTION – HERO : END ========================================= --> 
        
        <!-- ============================================== INFO BOXES ============================================== -->
        <div class="info-boxes wow fadeInUp" style="margin-top: 5px;">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box" style="background-color: #079b2c!important;height: 100px;">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Installation</h4>
                    </div>
                  </div>
                  <h6 class="text">Installation within 24hrs in all over India </h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box" style="background-color: #000!important;height: 100px;">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over INR 999</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box" style="background-color:#1d4d77!important;height: 100px;">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Extra INR 500 off on all items </h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <!-- /.info-boxes --> 
        <!-- ============================================== INFO BOXES : END ============================================== --> 
        <!-- ============================================== SCROLL TABS ============================================== -->

        @foreach($productsshow as $ps)

        
        @if($ps['brandname'] == 'Tata Sky' )
        <div class="row shadow">
        <?php
        
          setAB(1);

        ?>        
        </div>
        @elseif($ps['brandname'] == 'Videocon d2h')
        <div class="row banners shadow">
        <?php
        
          setB(2);
          setB(3);
          setB(4);

        ?>        
        </div>
        @elseif($ps['brandname'] == 'Airtel Digital TV' )
        <div class="row shadow">
        <?php
        
          setAB(5);

        ?>        
        </div>
        @endif

        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">{{$ps['brandname']}}</h3>
            
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">
            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                  @foreach($ps['products'] as $product)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="/products/{{$product->name}}/{{$product->id}}"><img  src="{{asset('img/productimage/'.$product->image1)}}" alt=""></a> </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>new</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="/products/{{$product->name}}/{{$product->id}}">{{$product->name}}</a></h3>
                          <div class="">
                                  @php
                                  $img="";
                                  $pid=$product->id;
                                  $r=DB::table('rating')->where('productid',$pid)->pluck('rating')->first();
                                 
                                  @endphp
                                  
                                 
                                
                                  @for($i=1; $i<=$r; $i++)
                                  <i class="fa fa-star checked" style="color:#e7b710;"></i>
                                  @endfor
                                  @for($j=$i; $j<=5; $j++)
                                  <i class="fa fa-star" style="color:#c0c0c0;"></i>
                                  @endfor

                                   <strong>{{round( $r, 1, PHP_ROUND_HALF_UP)}}</strong>
                                  
                             
                               
                          </div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> INR {{$product->promocost}}</span> <span class="price-before-discount">INR {{$product->cost}}</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->

                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->

                  @endforeach
                  
                  
                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            
          </div>
          <div class="more-info-tab clearfix ">
                   <a href="/productsbycategory/{{$ps['brandname']}}/{{$ps['brandid']}}"><h3 class="new-product-title pull-right" style="border: 1px solid #ff7713;padding: 8px;background: #de5e00;color: #fff;font-size: 11px;">View all</h3></a>
                 </div>
          <!-- /.tab-content --> 
        </div>
        @endforeach
 
        
      </div>
      <!-- /.homebanner-holder --> 
      <!-- ============================================== CONTENT : END ============================================== --> 
    </div>
    <!-- /.row --> 
    
  </div>
  <!-- /.container --> 
</div>

<!-- /#top-banner-and-menu --> 
@endsection

<?php


function setB($i) {
  $path = BANNER_PATH . 'banner_' . $i . '.jpg';
  if ( !file_exists($path) ) return;
  $modi = fileatime($path);

  echo '
    <div class="col-md-4">
        <img src="/banners/banner_' . $i . '.jpg" class="img-responsive img-rounded" alt="Banner ' . $i . '">
    </div>
  ';
}

function setAB($i) {
  $path = BANNER_PATH . 'banner_' . $i . '.jpg';
  if ( !file_exists($path) ) return;
  $modi = fileatime($path);

  echo '
    <div class="col-md-12">
        <img src="/banners/banner_' . $i . '.jpg" class="img-responsive img-rounded" alt="Banner ' . $i . '">
    </div>
  ';
}
?>