<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Khoa Pham Training</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content=" @yield('description')">
<meta name="author" content="">
<meta http-equiv="X-UA-Compatible" content="IE=100" >
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="{{ url('frontend/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{ url('frontend/css/bootstrap-responsive.css')}}" rel="stylesheet">
<link href="{{ url('frontend/css/style.css')}}" rel="stylesheet">
<link href="{{ url('frontend/css/flexslider.css')}}" type="text/css" media="screen" rel="stylesheet"  />
<link href="{{ url('frontend/css/jquery.fancybox.css')}}" rel="stylesheet">
<link href="{{ url('frontend/css/cloud-zoom.css')}}" rel="stylesheet">
<link href="{{ url('frontend/css/portfolio.css')}}" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="{{ url('frontend/assets/ico/favicon.ico')}}">
</head>
<body>
<!-- Header Start -->
<header>
    @include('block.header')
    
    @include('block.nav')
</header>
<!-- Header End -->

<div id="maincontainer">
  <!-- Slider Start-->
  @include('block.slider')
  <!-- Slider End-->
  
  <!-- Section Start-->
  @include('block.otherdetails')
  <!-- Section End-->
  
  <!-- Featured Product-->
  @yield('content')
</div>
<!-- /maincontainer -->

<!-- Footer -->
  @include('block.footer')
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="frontend/js/jquery.js"></script> 
<script src="frontend/js/bootstrap.js"></script> 
<script src="frontend/js/respond.min.js"></script> 
<script src="frontend/js/application.js"></script> 
<script src="frontend/js/bootstrap-tooltip.js"></script> 
<script defer src="frontend/js/jquery.fancybox.js"></script> 
<script defer src="frontend/js/jquery.flexslider.js"></script> 
<script type="text/javascript" src="frontend/js/jquery.tweet.js"></script> 
<script src="frontend/js/cloud-zoom.1.0.2.js"></script> 
<script  type="text/javascript" src="frontend/js/jquery.validate.js"></script> 
<script type="text/javascript"  src="frontend/js/jquery.carouFredSel-6.1.0-packed.js"></script> 
<script type="text/javascript"  src="frontend/js/jquery.mousewheel.min.js"></script> 
<script type="text/javascript"  src="frontend/js/jquery.touchSwipe.min.js"></script> 
<script type="text/javascript"  src="frontend/js/jquery.ba-throttle-debounce.min.js"></script> 
<script src="frontend/js/jquery.isotope.min.js"></script> 
<script defer src="frontend/js/custom.js"></script>
</body>
</html>