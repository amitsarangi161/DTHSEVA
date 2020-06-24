<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!-- Meta -->

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="DATAGRAM INDIA">
<meta name="keywords" content="DTH SEVA">
<meta name="robots" content="all">

<meta name="google-site-verification" content="UVn0Usk4SiWcIbzqOSVjggjwXOj_Q-CFR9c0LufmQb0" />


<title>DTH Seva</title>

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/blue.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/owl.transitions.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/rateit.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/bootstrap-select.min.css')}}">


<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{asset('assets/css/font-awesome.css')}}">

<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>





  <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

 

    <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
   
    <style type="text/css">
.livesearch_search_results {
background-color: #fff;
list-style-type: none;
margin: 0;
min-width: 75%;
position: absolute;
z-index: 1000;

text-align: left;
line-height: 30px;
font-weight: 600;

border-top: 1px solid #c0c0c0;
    

}
.livesearch_search_results li{
    color: #000;
    padding-left: 26px;
    }
.livesearch_search_results>li:hover{
    background: #bfbfbf80;
  
    }
    </style>

</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1"> 
  
  <!-- ============================================== TOP MENU ============================================== -->
  <div class="top-bar animate-dropdown" style="background-color: #5a3371!important">
    <div class="container">
      <div class="header-top-inner">
        <div class="cnt-account" style="float:left;">
          <ul class="list-unstyled">
            <li><a href="#"><i class="icon fa fa-phone"></i><span style="color:#fff; font-weight:800;font-size: 15px;">9861064963</span></a></li>
          </ul>
        </div>
        <div class="cnt-account">
          <ul class="list-unstyled">
            <!-- <li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>
            <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
            <li><a href="#"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
            <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li> -->
            @if(Session::get('userid')['status'] =="N" OR Session::get('userid')['status'] =="")
            <li><a href="/userlogin"><i class="icon fa fa-lock"></i>Login</a></li>
            <li>||</li>
            <li><a href="/customerregister"><i class="icon fa fa-lock"></i>Register</a></li>
            @endif
            @if(Session::get('userid')['status'] =="Y")
            @php 
              $wallet=\App\wallet::where('user_id',Session::get('userid')['uid'])->get();
              $walletbal=$wallet->sum('credit')-$wallet->sum('debit');
            @endphp
              <li><a href="/myaccount"><i class="icon fa fa-user"></i>My Account</a></li>
              <li class="menu-item"><a href="/myaccount"><i class="fa fa-pencil" aria-hidden="true"></i><strong>  {{Session::get('userid')['name']}}</strong></a></li>
              <li class="menu-item"><strong><a href="/#"><i class="fa fa-credit-card" aria-hidden="true"></i> INR. {{$walletbal}} </a></strong></li>
              <li class="menu-item"><a href="/userLogout"><i class="fa fa-sign-out" aria-hidden="true"></i> logout</a></li>
            @endif

          </ul>
        </div>
        <!-- /.cnt-account -->
        
        
        <!-- /.cnt-cart -->
        <div class="clearfix"></div>
      </div>
      <!-- /.header-top-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.header-top --> 
  <!-- ============================================== TOP MENU : END ============================================== -->
  <div class="main-header" style="background-color: #8d20ca!important;">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder"> 
          <!-- ============================================================= LOGO ============================================================= -->
          <div class="logo"> <a href="/"> <img src="{{asset('assets/images/logo.png')}}" alt="logo"> </a> </div>
          <!-- /.logo --> 
          <!-- ============================================================= LOGO : END ============================================================= --> </div>
        <!-- /.logo-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder"> 
          <!-- /.contact-row --> 
          <!-- ============================================================= SEARCH AREA ============================================================= -->
          <div class="search-area">
            <form >
              <div class="control-group">
                
                <input type="search" onkeyup="searchProduct(this.value);" class="search-field search-input" placeholder="Type Here to Search " autocomplete="off"/>
                <a class="search-button" href="#" ></a>

                 <div class="livesearch_search_results">
                  <ul id="result"></ul>
                  </div>

                 </div>
            </form>
          </div>
          <!-- /.search-area --> 
          <!-- ============================================================= SEARCH AREA : END ============================================================= --> </div>
        <!-- /.top-search-holder -->
        
        <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row"> 
          <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
          <p class="free-cod">All India <br>Cash on Delivery </p>
       
          <!-- /.dropdown-cart --> 
          
          <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= --> </div>
        <!-- /.top-cart-row --> 
      </div>
      <!-- /.row --> 
      
    </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.main-header --> 
  
  <!-- ============================================== NAVBAR ============================================== -->
  <div class="header-nav animate-dropdown" style="background-color:#4bae36 !important">
    <div class="container">
      <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
       <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> 
       <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
          <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
            <div class="nav-outer">
              <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : '' }} dropdown yamm-fw"> <a href="/">Home</a> </li>
                
                <li class="{{ Request::is('productsbycategory*') ? 'active' : '' }} dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Products</a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content ">
                        <div class="row">
                          @php
                            $productsmenu=App\product::select('products.*','brands.brandname')
                            ->leftJoin('brands','products.brandid','=','brands.id')
                            ->groupBy('products.brandid')
                            ->get();
                          @endphp

                          @foreach($productsmenu->chunk(5) as $pm)
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            
                            <ul class="links">
                              @foreach($pm as $p)
                              <li><a href="/productsbycategory/{{$p->brandname}}/{{$p->brandid}}">{{$p->brandname}}</a></li>
                              
                              @endforeach
                            </ul>

                          </div>
                         @endforeach
                          <!-- /.col -->
                          
                          
                          <!-- /.col -->
                          
                          
                          <!-- /.col -->
                          
                          
                          <!-- /.yamm-content --> 
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="{{ Request::is('packages*') ? 'active' : '' }} dropdown mega-menu"> 
                <a href=""  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Packages <!-- <span class="menu-label hot-menu hidden-xs">hot</span> --> </a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                           @php
                            $packagemenu=App\package::select('packages.*','brands.brandname')
                            ->leftJoin('brands','packages.brand','=','brands.id')
                            ->groupBy('packages.brand')
                            ->get();
                          @endphp
                          @foreach($packagemenu->chunk(2) as $pkm)
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            @foreach($pkm as $pk)
                            <ul class="links">
                              <li><a href="/packages/{{$pk->brandname}}/{{$pk->brand}}">{{$pk->brandname}}</a></li>
                             
                             @endforeach
                            </ul>
                          </div>
                          @endforeach
                          <!-- /.col -->
                         
                         
                          <!-- /.col -->
                          
                          
                        </div>
                        <!-- /.row --> 
                      </div>
                      <!-- /.yamm-content --> </li>
                  </ul>
                </li>
                <li class="{{ Request::is('channels*') ? 'active' : '' }} dropdown mega-menu"> 
                <a href=""  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Channels <!-- <span class="menu-label hot-menu hidden-xs">hot</span> --> </a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content">
                        <div class="row">
                           @php
                            $channels=App\saleschannel::select('saleschannels.*','brands.brandname')
                            ->leftJoin('brands','saleschannels.brand','=','brands.id')
                            ->leftJoin('channels','saleschannels.channelid','=','channels.id')
                            ->groupBy('saleschannels.brand')
                            ->get();
                          @endphp
                          @foreach($channels->chunk(3) as $ch)
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            @foreach($ch as $c)
                            <ul class="links">
                              <li><a href="/channels/{{$c->brandname}}/{{$c->brand}}">{{$c->brandname}}</a></li>
                             
                             @endforeach
                            </ul>
                          </div>
                          @endforeach
                          <!-- /.col -->
                         
                         
                          <!-- /.col -->
                          
                          
                        </div>
                        <!-- /.row --> 
                      </div>
                      <!-- /.yamm-content --> </li>
                  </ul>
                </li>


                <!-- <li class="dropdown hidden-sm"> <a href="/allchannelinfo">Channel Info</a>  -->



                </li>


                
               <li class="{{ Request::is('recharge*') ? 'active' : '' }} dropdown yamm mega-menu"> <a href="#" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Recharge</a>
                  <ul class="dropdown-menu container">
                    <li>
                      <div class="yamm-content ">
                        <div class="row">
                        

                          
                          <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                            
                            <ul class="links">
                             
                              <li><a href="/recharge/recharge">DTH Recharge</a></li>
                              <li><a href="/recharge/mobilerecharge">Mobile Recharge</a></li>
                              
                        
                            </ul>

                          </div>
                       
                          <!-- /.col -->
                          
                          
                          <!-- /.col -->
                          
                          
                          <!-- /.col -->
                          
                          
                          <!-- /.yamm-content --> 
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li class="dropdown yamm-fw"> <a href="https://blog.dthseva.com">Blog</a> </li>

              </ul>
              <!-- /.navbar-nav -->
              <div class="clearfix"></div>
            </div>
            <!-- /.nav-outer --> 
          </div>
          <!-- /.navbar-collapse --> 
          
        </div>
        <!-- /.nav-bg-class --> 
      </div>
      <!-- /.navbar-default --> 
    </div>
    <!-- /.container-class --> 
    
  </div>
  <!-- /.header-nav --> 
  <!-- ============================================== NAVBAR : END ============================================== --> 
  
</header>


@yield('content')




<!-- ============================================================= FOOTER ============================================================= -->
<footer id="footer" class="footer color-bg">
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="module-heading">
            <h4 class="module-title">Contact Us</h4>
          </div>
          <!-- /.module-heading -->
          
          

                <div class="media-body" style="color:#fff;">
                    <p>9861064963</p>
                    <p>support@dthseva.com</p>
                </div>
            </li>
              
              
              
                        <div class="">
            <ul class="">
              <li class="media">
                          <div class="social">
            <div class="module-heading">
          </div>
                <ul class="link">
                  <li class="fb" style="float: left;"><a target="_blank" rel="nofollow" href="https://www.facebook.com/DTHSEVA999/" title="Facebook"></a></li>
                  <!--<li class="tw" style="float: left;"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>-->
                  <li class="googleplus" style="float: left;"><a target="_blank" rel="nofollow" href="https://plus.google.com/105713731500446393682" title="GooglePlus"></a></li>
                </ul>
            </div>
              
              
              
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="module-heading">
            <h4 class="module-title">Customer Service</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="module-body">
            <ul class='list-unstyled'>
              <li class="first"><a href="/aboutus" title="Contact us">About Us</a></li>
              <li class="first"><a href="/refundpolicy" title="Contact us">Cancellation & Refund Policy</a></li>
              <li><a href="/privacy" title="About us">Privacy Policy</a></li>
              <li class="last"><a href="/tnc" >Terms & Conditions</a></li>
            </ul>
          </div>
          <!-- /.module-body --> 
        </div>
        <!-- /.col -->
        
        
        <!-- /.col -->
        
        <div class="col-xs-12 col-sm-6 col-md-4">
          <div class="module-heading">
            <h4 class="module-title">Payment Method</h4>
          </div>
          <!-- /.module-heading -->
          
          <div class="clearfix payment-methods">
          <ul>
            <li style="float: left; padding: 2px;"><img src="{{asset('assets/images/payments/1.png')}}" alt=""></li>
            <li style="float: left; padding: 2px;"><img src="{{asset('assets/images/payments/2.png')}}" alt=""></li>
            <li style="float: left; padding: 2px;"><img src="{{asset('assets/images/payments/3.png')}}" alt=""></li>
            <li style="float: left; padding: 2px;"><img src="{{asset('assets/images/payments/4.png')}}" alt=""></li>
            
          </ul>
        </div>
          <!-- /.module-body --> 

        </div>
      </div>
    </div>
  </div>
  <div class="copyright-bar">
    <div class="container">
      <div class="col-xs-12 col-sm-6 no-padding">
                <ul class="link">
                  <li class="footer-copyright text-center py-3">© 2018 Copyright:
      <a href="#"> DTH SEVA</a></li>
                
                </ul>
            </div>
      <div class="col-xs-12 col-sm-6 no-padding">
        
        <ul class="link">
                  <li class="footer-copyright text-center py-3">Powered by
      <a href="http://www.datagramindia.com/"> DATAGRAM INDIA</a></li>
                
                </ul>
        <!-- /.payment-methods --> 
      </div>

    </div>
  </div>
</footer>

<div class="modal fade" id="promobox" role="dialog" data-backdrop="static" data-keyboard="false" style="margin-top: 30px;">

       
         <div class="container">
         <div class="row ">
             
           <div class="col-md-6 col-md-offset-3 " style="background:#fff;padding: 20px;">
               
               
           <div class="promoimage">
               <i  data-dismiss="modal" class="fa fa-times-circle close" style="font-size:26px; float:right;"></i>  
               <img style="width: 100%;height: auto;" class="img img-responsive" src="/img/offer.jpg">
           </div>
           
           <br>
           <form action="/addsubscriber" method="post">
            {{csrf_field()}}
           <div class="subscribe">
        <div class="form-group" >
        <label class="info-title" for="exampleInputEmail1"><strong style="font-weight:600;font-size: 15px;">For More Discount Enter your Mobile Number</strong></label>
        <input type="number" id="mobile"  name="mobile" class="form-control unicase-form-control text-input"  >
        </div>
        <div>
        <button class="btn btn-warning btn-flat form-control" id="sbm" type="submit">Get This Offer</button>

        </div>
           
         </div>
       </form>
     
      </div>
      </div>
     
  </div>
  </div>
<!-- ============================================================= FOOTER : END============================================================= --> 

<!-- For demo purposes – can be removed on production --> 

<!-- For demo purposes – can be removed on production : End --> 

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{asset('assets/js/jquery-1.11.1.min.js')}}"></script> 
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script> 
<script src="{{asset('assets/js/bootstrap-hover-dropdown.min.js')}}"></script> 
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script> 
<script src="{{asset('assets/js/echo.min.js')}}"></script> 
<script src="{{asset('assets/js/jquery.easing-1.3.min.js')}}"></script> 
<script src="{{asset('assets/js/bootstrap-slider.min.js')}}"></script> 
<script src="{{asset('assets/js/jquery.rateit.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('assets/js/lightbox.min.js')}}"></script> 
<script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script> 
<script src="{{asset('assets/js/wow.min.js')}}"></script> 
<script src="{{asset('assets/js/scripts.js')}}"></script>
</body>

 @if(Session::get('userid')['status'] !="Y" AND Session::get('offerapply')!='Y')
<script>
    $(document).ready(function(){
        $("#promobox").modal();
    });
</script>
@endif
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b5ef680e21878736ba27212/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<script type="text/javascript">
   
 

    function searchProduct(key)
    {

        if(key=='')
        {
               $("#result").empty();
        }
        else{
    $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
            }
        });

   //var u="business.draquaro.com/api.php?id=9658438020";

           $.ajax({
               type:'POST',
              
               url:'{{url("/searchProduct")}}',
              
               data: {
                     "_token": "{{ csrf_token() }}",
                      key: key
                     },

               success:function(data) { 
             
                    
                   $("#result").empty();
                    var jsonObject=eval(data);
                    $.each(jsonObject,function(key,value){
                        
                     
             var x="<a href='/search/"+value.name+"/"+value.id+"  '>"+"<li>"+value.name   +"&nbsp;" +"<b style='color: #fe0e0e'>in"+"   "+value.brandname +" category"+"</b></li>"+"</a>";

                    $("#result").append(x);

                          
                    });
                  
                }
              });
       }
       }
    
  
</script>
</html>