  @extends('layouts.frontend')
  @section('content')
<div class="breadcrumb">
  <div class="container">
    <!-- /.breadcrumb-inner --> 
  </div>
  <!-- /.container --> 
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
  <div class='container'>
    <div class='row'>
    
          <!----------- Testimonials------------->
           
      <!-- /.sidebar -->
      <div class='col-md-12'> 
        <!-- ========================================== SECTION – HERO ========================================= -->
        
        <div id="category" class="category-carousel hidden-xs">
          <div class="item">
            <!-- <div class="image"> <img src="assets/images/banners/cat-banner-1.jpg" alt="" class="img-responsive"> </div> -->
            
            <!-- /.container-fluid --> 
          </div>
        </div>
        
     
        <div class="clearfix filters-container m-t-10">
          <div class="row">
            
            <!-- /.col -->
            <div class="col col-sm-12 col-md-6">
              <div class="col col-sm-3 col-md-6 no-padding">
                <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                  <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                      <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> SORT BY <span class="caret"></span> </button>
                      <ul role="menu" class="dropdown-menu">
                       
                        <li role="presentation"><a href="?price=asc">Price:Lowest first</a></li>
                        <li role="presentation"><a href="?price=desc">Price:HIghest first</a></li>
                        <li role="presentation"><a href="?name=asc">A-Z</a></li>
                        <li role="presentation"><a href="?name=desc">Z_A</a></li>
                        
                      </ul>
                    </div>
                  </div>
                  <!-- /.fld --> 
                </div>
                <!-- /.lbl-cnt --> 
              </div>
              <!-- /.col -->
              
              <!-- /.col --> 
            </div>
            <!-- /.col -->
            <div class="col col-sm-6 col-md-4 text-right">
              <div class="pagination-container">
               {{$products->links()}}
                <!-- /.list-inline --> 
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <div class="search-result-container ">
          <div id="myTabContent" class="tab-content category-list">
            <div class="tab-pane active " id="grid-container">
              <div class="category-product">
                <div class="row">


                  @foreach($products as $product)
                  <div class="col-sm-6 col-md-4 wow fadeInUp">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="/products/{{$product->name}}/{{$product->id}}"><img  src="{{asset('img/productimage/'.$product->image1)}}" alt=""></a> </div>
                          <!-- /.image -->
                          
                         
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
                          <div class="product-price"> <span class="price">INR {{$product->promocost}} </span> <span class="price-before-discount">INR{{$product->cost}}</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                    
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  @endforeach
                  <!-- /.item -->
                  

                </div>
                <!-- /.row --> 
              </div>
              <!-- /.category-product --> 
              
            </div>
            <!-- /.tab-pane -->
            
            
            <!-- /.tab-pane #list-container --> 
          </div>
          <!-- /.tab-content -->
          <div class="clearfix filters-container">
            <div class="text-right">
              <div class="pagination-container">
                {{$products->links()}}
                <!-- /.list-inline --> 
              </div>
              <!-- /.pagination-container --> </div>
            <!-- /.text-right --> 
            
          </div>
          <!-- /.filters-container --> 
          
        </div>
        <!-- /.search-result-container --> 
        
      </div>
      <!-- /.col --> 
    </div>
    <!-- /.row --> 
    
     
  
</div>
<br>
@endsection