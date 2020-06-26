<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DTH SEVA') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <!-- Ionicons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('dist/css/AdminLTE.min.css')}}">
      <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="{{ asset('dist/css/skins/_all-skins.min.css')}}">
      <!-- iCheck -->
      <link rel="stylesheet" href="{{ asset('plugins/iCheck/flat/blue.css')}}">
      <!-- Morris chart -->
      <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css')}}">
      <!-- jvectormap -->
      <link rel="stylesheet" href="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
      <!-- Date Picker -->
      <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css')}}">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
      <!-- bootstrap wysihtml5 - text editor -->
      <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
    
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <!-- Typeahead Initialization -->
<!--     <script>
        jQuery(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var engine = new Bloodhound({
                remote: {
                   "_token": "{{ csrf_token() }}",
                    url: '/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $(".search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                source: engine.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'usersList',

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [
                        '<div class="list-group search-results-dropdown"><div class="list-group-item user-header">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown user-header">'
                    ],
                    suggestion: function (data) {
                        return '<a class="form-control" href="/selleraccount/' + data.id + '" class="bg-warning" style="text-transform:uppercase;"><div>' + data.sellername + ' - Seller ID-' + data.id + '</div></a>'
              }
                }
            });
        });
    </script> -->

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/knob/jquery.knob.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- datepicker -->
    <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('plugins/fastclick/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/app.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"> i C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">iC-<b>DTH SEVA.</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <!-- Sidebar toggle button-->
      

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
           
          <li class="dropdown user user-menu">
      
            @if (Auth::guest())
          <li><a href="{{ route('login') }}">Login</a></li>
          <li><a href="{{ route('register') }}">Register</a></li>
         
        @else

      
             <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-warning btn-flat">Sign out</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                  </form>
            
           @endif
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
<div id="myloaderDiv" style="display:none; width: 100%; height: 100%; background-color: #ffffffb3; position: absolute; top:0; bottom: 0; left: 0; right: 0; margin: auto; z-index: 9999;">
        <img style="position: absolute; top:0; bottom: 0; left: 0; right: 0; margin: auto;" id="loading-image" src="{{ asset('images/loader/loader-dtpl.gif') }}" style=""/>
    </div>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        @if (Auth::user())

        <div class="pull-left info">
          <p> {{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
        @endif
       
      </div>
     




      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
         <li class="{{ Request::is('/home') ? 'active' : '' }} treeview">
          <a href="/home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              
            </span>
          </a>
          </li>

        <li class="{{ Request::is('msetup*') ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-rss"></i> <span>Master Setups</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('msetup/brands') ? 'active' : '' }}"><a href="/msetup/brands"><i class="fa fa-circle-o text-red"></i>Brands</a></li>
            <li class="{{ Request::is('msetup/mobileoperators') ? 'active' : '' }}"><a href="/msetup/mobileoperators"><i class="fa fa-circle-o text-red"></i>Mobile Operator</a></li>

            <li class="{{ Request::is('msetup/category') ? 'active' : '' }}"><a href="/msetup/category"><i class="fa fa-circle-o text-red"></i>Category</a></li>
            <li class="{{ Request::is('msetup/channels') ? 'active' : '' }}"><a href="/msetup/channels"><i class="fa fa-circle-o text-red"></i>Channels</a></li>

             
          </ul>
  </li>
 

       
        <li class="{{ Request::is('psetup*') ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-product-hunt"></i> <span>Poduct Setups</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('psetup/product') ? 'active' : '' }}"><a href="/psetup/product"><i class="fa fa-circle-o text-red"></i>Add Poducts</a></li>

            <li class="{{ Request::is('psetup/viewallproduct') ? 'active' : '' }}"><a href="/psetup/viewallproduct"><i class="fa fa-circle-o text-red"></i>View All Product</a></li>

            <li class="{{ Request::is('psetup/package') ? 'active' : '' }}"><a href="/psetup/package"><i class="fa fa-circle-o text-red"></i>Add Package</a></li>

            <li class="{{ Request::is('psetup/viewallPackages') ? 'active' : '' }}"><a href="/psetup/viewallPackages"><i class="fa fa-circle-o text-red"></i>View All Packages</a></li>

            <li class="{{ Request::is('psetup/salechannels') ? 'active' : '' }}"><a href="/psetup/salechannels"><i class="fa fa-circle-o text-red"></i>channels for sale</a></li>

            <li class="{{ Request::is('psetup/coupon') ? 'active' : '' }}"><a href="/psetup/coupon"><i class="fa fa-circle-o text-red"></i>Coupon Master</a></li>

           

             
          </ul>
  </li>



         <li class="{{ Request::is('cms*') ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>CMS Setup</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('cms/sliders') ? 'active' : '' }}"><a href="/cms/sliders"><i class="fa fa-circle-o text-red"></i>Add Sliders</a></li>

            <li class="{{ Request::is('cms/allsliders') ? 'active' : '' }}"><a href="/cms/allsliders"><i class="fa fa-circle-o text-red"></i>View all Sliders</a></li>

            <li class="{{ Request::is('cms/companypolicies') ? 'active' : '' }}"><a href="/cms/companypolicies"><i class="fa fa-circle-o text-red"></i>Company Policy</a></li>

            <li class="{{ Request::is('cms/offerimage') ? 'active' : '' }}"><a href="/cms/offerimage"><i class="fa fa-circle-o text-red"></i>Advertisement</a></li>

            <li class="{{ Request::is('cms/add-banners') ? 'active' : '' }}"><a href="/cms/add-banners"><i class="fa fa-circle-o text-red"></i>Add Banners</a></li>

             
          </ul>
  </li>



       <li class="{{ Request::is('orders*') ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Order Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('orders/productorders') ? 'active' : '' }}"><a href="/orders/productorders"><i class="fa fa-circle-o text-red"></i>Product Orders</a></li>

          <!--   <li class="{{ Request::is('orders/rechargeorders') ? 'active' : '' }}"><a href="/orders/rechargeorders"><i class="fa fa-circle-o text-red"></i>Recharge Orders</a></li> -->
             
          </ul>
  </li>

        <li class="{{ Request::is('customers*') ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Customers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('customers/addcustomer') ? 'active' : '' }}"><a href="/customers/addcustomer"><i class="fa fa-circle-o text-red"></i>Add New Customer</a></li>
            <li class="{{ Request::is('customers/viewallcustomer') ? 'active' : '' }}"><a href="/customers/viewallcustomer"><i class="fa fa-circle-o text-red"></i>View all Customer</a></li>
        
          </ul>
  </li>

     <li class="{{ Request::is('reports*') ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ Request::is('reports/paymentreport') ? 'active' : '' }}"><a href="/reports/paymentreport"><i class="fa fa-circle-o text-red"></i>Payment Report</a></li>
            <li class="{{ Request::is('reports/onepayreport') ? 'active' : '' }}"><a href="/reports/onepayreport"><i class="fa fa-circle-o text-red"></i>One Pay Report</a></li>
             <li class="{{ Request::is('reports/walletreport') ? 'active' : '' }}"><a href="/reports/walletreport"><i class="fa fa-circle-o text-red"></i>Wallet Report</a></li>
        
          </ul>
     </li>

  <li class="{{ Request::is('recharge*') ? 'active' : '' }} treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>RECHARGE AND BILLS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li class="{{ Request::is('recharge/checkmybalance') ? 'active' : '' }}"><a href="/recharge/checkmybalance"><i class="fa fa-circle-o text-red"></i>CHECK MY BALANCE</a></li> -->
               <li class="{{ Request::is('recharge/rechargeorders') ? 'active' : '' }}"><a href="/recharge/rechargeorders"><i class="fa fa-circle-o text-red"></i>DTH Recharge Orders</a></li>
               <li class="{{ Request::is('recharge/mobilerechargeorders') ? 'active' : '' }}"><a href="/recharge/mobilerechargeorders"><i class="fa fa-circle-o text-red"></i>Mobile Recharge Orders</a></li>
             
        
          </ul>
  </li>
         
       
    </section>
    <!-- /.sidebar -->
  </aside>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               
               PRODUCTION SOFTWARE

               <!--  <small>

                    @foreach(Request::segments() as $segment)
                    <li>
                       <a href="#"><span style="text-transform:uppercase;">{{$segment}}</span></a>
                    </li>
                    @endforeach
                        
                </small> -->
            </h1>
            <ol class="breadcrumb">

                @foreach(Request::segments() as $segment)
                <li>
                   <a href="#"><span style="text-transform:uppercase;">{{$segment}}</span></a>
                </li>
                @endforeach 
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          @yield('content')
           
        </section> 


    </div>

    <div class="modal fade " id="myModal" role="dialog">
        <div class="modal-dialog ">
        
          <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"> Reset Password</h4>
                  <form class="form-horizontal" role="form" method="POST" action="">
                    {{ csrf_field() }}

                  <table class="table table-responsive table-hover table-bordered">
                    <tr>
                    <td>NEW PASSWORD</td>
                    <td><input id="password" type="password" name="password" placeholder="Enter New Password"></td>
                    </tr>
                    <tr>
                    <td>CONFIRM PASSWORD</td>
                    <td><input id="confirm_password" type="password" name="pass2" placeholder="Confirm Password"><span id='message'></span></td>
                    </tr>
                    <tr><td colspan="2">  <span id='result'><button class="btn btn-success" type="submit" disabled>RESET NOW
                    </button></span></td></tr>
                  </table>

                  </form>
                </div>
       
            </div>
        </div>
    </div>




<script type="text/javascript">
var jqf = $.noConflict();

  jqf('#password, #confirm_password').on('keyup', function () {
  if (jqf('#password').val() == jqf('#confirm_password').val()) {
    jqf('#result').html('<button class="btn btn-success" type="submit">RESET NOW</button>');
  } else 
    jqf('#result').html('<button class="btn btn-success" type="submit" disabled>RESET NOW</button>');
});
</script>


   


  
  <footer class="main-footer no-print">

    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="http://www.datagramindia.com">DATAGRAM INDIA</a>.</strong> All rights
    reserved.
  </footer>

    
</body>
</html>
