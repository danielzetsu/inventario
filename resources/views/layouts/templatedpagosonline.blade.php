<!DOCTYPE HTML>
<!--
	PROGRAMADOR DE CABARCAS SARMIENTO SAS
	daniel.davi.arroyo.violet@gmail.com
	Attribution 3.0 license
-->
<html>
	<head>
		<title>CABARCAS SARMIENTO SAS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!-- <link rel="stylesheet" href="assets/css/main.css" />-->
		<meta name="csrf-token" content="{{ csrf_token() }}"> 
		<link href="{{ URL::to('/TemplatedPagosOnline/') }}/assets/css/main.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="{{ URL::to('/TemplatedPagosOnline/') }}/assets/css/parent-wrapper.css" media="screen" rel="stylesheet" type="text/css" /> 
		<!-- CUSTOM CSS -->  
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
					 
	</head>
	<body>
<style type="text/css">  
.whatsapp {
	position:fixed;
	width:60px;
	height:60px;
	bottom:40px;
	right:20px;
	background-color:#25d366;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	font-size:30px;
	z-index:100;
}

.whatsapp-icon {
 	margin-top:13px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.title {
  color: grey;
  font-size: 18px;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

.button:hover, a:hover {
  opacity: 0.7;
}
body.smart-style-6 .alert-danger {
    border-color: #B71C1C;
}

element.style {
}
body.smart-style-6 .alert-danger {
    border-color: #B71C1C;
}
body.smart-style-6 .alert-danger, body.smart-style-6 .bg-color-red, body.smart-style-6 .slider-danger+.slider-track>.slider-selection {
    background: #F44336!important;
}
.alert-danger {
    border-color: #953b39;
    color: #fff;
    background-color: #c26565;
    text-shadow: none;
}
.alert {
    margin-bottom: 20px;
    margin-top: 0;
    color: #675100;
    border-width: 0;
    border-left-width: 5px;
    padding: 10px;
    border-radius: 0;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
}
::marker {
    unicode-bidi: isolate;
    font-variant-numeric: tabular-nums;
    text-transform: none;
    text-indent: 0px !important;
    text-align: start !important;
    text-align-last: start !important;
}
#header{
	background: url("{{asset('img/pagosenlinea/ENCABEZADO.png')}}"); 
	position: absolute;
	height: auto; 
	background-size: cover;
	background-position: center;  
}
@media only screen and (max-width: 1905px) {
	#header{

	background: url("{{asset('img/pagosenlinea/encabezadomedio.png')}}");
	width: 100% ;
	background-size: cover;
	}

}
@media only screen and (max-width: 1277px) {

	#header {
		position: absolute;
		background: url("{{asset('img/pagosenlinea/encabezadopromedio.png')}}");
		background-size: cover;    
	}
	.square {
		margin-top: 10px;"
	}
}
@media only screen and (max-width: 980px) {
	#header {
		position: absolute;
		background: url("{{asset('img/pagosenlinea/encabezadopromedio.png')}}");   
	}
	.square {
		margin-top: 10px;"
	}
}
@media only screen and (max-width: 580px) {

	#header {
		position: absolute;
		background: url("{{asset('img/pagosenlinea/ENCABEZADOSMOLL.png')}}");
		height: auto; 
		background-size: cover;
		background-position: center;
	} 
	.square {
		margin-top: 10px;"
	}
}
</style>

		<!-- Header -->
			<header id="header">
				<!--<a href="index.html" class="logo"><strong>Binary</strong> by TEMPLATED</a>--> 

				<nav>
					<a  href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="{{url('pagosenlinea')}}">Home</a></li>
					<li><a href="{{url('pagosenlinea/forms')}}">Ir a Pagos</a></li> 
				</ul>
			</nav>

			@yield('content')

		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<!--<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>-->
					<li><a href="https://es-la.facebook.com/cabarcassarmientosas/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="https://instagram.com/cabarcassarmiento?igshid=1degiqy0lcbrw" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
				</ul>
				<div class="copyright">
					&copy; CABARCAS SARMIENTOS  <a href="https://www.cabarcassarmientosas.com/">www.cabarcassarmientosas.com</a>
					<!-- HECHO POR INGENIERO DANIEL DAVID ARROYO VIOLET.-->
				</div>
			</footer> 

			<a href="https://wa.me/573107250934?text=Me%20gustaría%20saber%20como%20pagar%20por%20la%20pagina%20web%20de%20cabarcas%20sarmientos" class="whatsapp" target="_blank"> 
				<i class="fa fa-whatsapp whatsapp-icon"></i>
			</a>

		<!-- Scripts --> 
			<script src="{{ URL::to('/TemplatedPagosOnline/') }}/assets/js/jquery.min.js" type="text/javascript"></script>
			<script src="{{ URL::to('/TemplatedPagosOnline/') }}/assets/js/jquery.scrolly.min.js" type="text/javascript"></script>
			<script src="{{ URL::to('/TemplatedPagosOnline/') }}/assets/js/skel.min.js" type="text/javascript"></script>
			<script src="{{ URL::to('/TemplatedPagosOnline/') }}/assets/js/util.js" type="text/javascript"></script>
			<script src="{{ URL::to('/TemplatedPagosOnline/') }}/assets/js/main.js" type="text/javascript"></script> 
			 <!-- SCRIPTS -->  

			<script src="{{ URL::to('/SmartAdmin/') }}/js/notification/SmartNotification.min.js" type="text/javascript"></script>
		    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	</body>
</html>