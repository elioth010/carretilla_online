<!DOCTYPE HTML>
<html>
<head>
<title>Carretilla Online</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
{{ HTML::style('web/css/bootstrap.css') }}

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
{{ HTML::script('web/js/jquery-1.11.1.min.js') }}
<!-- Custom Theme files -->
{{ HTML::style('web/css/style.css') }}

<!-- Custom Theme files -->
<!-- webfonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>
<!-- webfonts -->
{{ HTML::style('web/css/etalage.css') }}
{{ HTML::script('web/js/jquery.etalage.min.js') }}
		<script>
			jQuery(document).ready(function($){
				$('#etalage').etalage({
					thumb_image_width: 300,
					thumb_image_height: 400,
					source_image_width: 900,
					source_image_height: 1200,
					show_hint: true,
					click_callback: function(image_anchor, instance_id){
						alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
					}
				});
				$(window).resize(function (){
					$("#principal").css({
						'margin-top': ($("#menu-container").children().height()+50)
					});
				});
				$(window).resize();

			});
		</script>
		{{ HTML::script('web/js/easyResponsiveTabs.js') }}
		<script type="text/javascript">
		$(document).ready(function () {
			$('#horizontalTab').easyResponsiveTabs({
				type: 'default', //Types: default, vertical, accordion           
			    width: 'auto', //auto or any width like 600px
			    fit: true   // 100% fit in a container
			 });
		});
		</script>
		{{ HTML::script('web/js/fwslider.js') }}
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#slider').fwslider({
					auto:     true,  //auto start
					speed:    300,   //transition speed
					pause:    4000,  //pause duration
					panels:   5,     //number of image panels
					width:    1680,
					height:   500,
					nav:      true   //show navigation
				});
			});
		</script>				   
</head>
<body>
<div id="menu-container" class="container">
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Carretilla Online</a>
    </div>
    <div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ URL::route('home') }}">Home</a></li>
		@if(Auth::check())
        <li><a href="{{ URL::route('profile') }}">Profile</a></li>
        <li><a href="{{ URL::route('logout') }}">Logout ('{{Auth::user()->username}}')</a></li>
		@else
        <li><a href="{{ URL::route('login') }}">Login</a></li>
		@endif
      </ul>
    </div>
  </div>
</nav>	
</div><!-- end container-->
<!-- check for flash notification message -->
@if(Session::has('flash_notice'))
	<div id="flash_notice">{{ Session::get('flash_notice') }}</div>
@endif

@yield('content')
	
      <div class="copy">
		 <p>© 2015 Template by <a href="http://elblogdeklank.net" target="_blank"> @klank4135</a></p>
	  </div>
</body>
</html>