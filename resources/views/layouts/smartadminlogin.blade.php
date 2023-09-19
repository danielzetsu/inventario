<!DOCTYPE html>
<html lang="es-es" id="extr-page" class="smart-style-6">
	<head>
    	<meta name="robots" content="noindex,nofollow">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
		<meta content="" name="description" />
		<meta content="" name="author" />
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta content="yes" name="apple-mobile-web-app-capable" />
		<meta content="black" name="apple-mobile-web-app-status-bar-style" />
		<link href="https://fonts.googleapis.com/css?family=Permanent+Marker|Righteous|Titan+One|Ubuntu" rel="stylesheet">
		<title>Cabarcas/@yield('pageTitle')</title>
    	<?php //echo view::renderPartial("HeadSmartAdmin"); ?>
    	@include('layouts/head')
    	<!--================================================== -->
		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<!--<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php //echo URL_PLANTILLA; ?>js/plugin/pace/pace.min.js"></script>-->

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local {{ URL::to('/SmartAdmin/') }} -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		<!--<script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>-->
		
		<style type="text/css">
			.btn-circle.btn-lg {
			    width: 55px;
			    height: 55px;
			    padding: 10px;
			    font-size: 18px;
			    line-height: 40px;
			    border-radius: 50%;
			    -moz-border-radius: 50%;
			    -webkit-border-radius: 50%;
			}
			#extr-page #main {
			    padding-top: 5px;
			}
		</style>
	</head>
	
	<body class="animated fadeInDown smart-style-6">
		<div id="main" role="main">
			<div class="row">
              	<div class="col-md-8 hidden-xs">
               		<img id="background_background_image" alt="Ilustración" src="{{url('/')}}/img/imagen-kawasaki2.jpg" style="width: 100%; height:auto; height: 100%; visibility: visible; background-color: rgb(235, 60, 0);, float: left" class="hide-phone">
               			
               			<div style=" position: absolute; top: 20px; left: 100px; width: 90%;">
               				
               			</div>

               			<div style=" position: absolute; top: 300px; right: 20px;">

               		
						</div>
              	</div>
             	<div class="col-md-4">
              		@yield('content')	
              	</div>
          	</div>	
		</div>

		<!--================================================== -->	

		@include('layouts/DefaultPageScript')
        
        
		

	</body>
</html>