<!DOCTYPE html>
<html lang="es-es" class="smart-style-6">
<?php header('Access-Control-Allow-Origin: *'); ?>

<head>
		<meta name="robots" content="noindex,nofollow">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
		<meta content="" name="description" />
		<meta content="" name="author" />
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
		<meta content="yes" name="apple-mobile-web-app-capable" />
		<meta content="black" name="apple-mobile-web-app-status-bar-style" />
		<!-- CSRF Token -->
    	<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Intranet v2/<!--yield('pageTitle')--></title>

    	<!--stack("styles")-->
    	@include('layouts/head')
    	<!--================================================== -->
		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<!--<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?php //echo URL_PLANTILLA; ?>js/plugin/pace/pace.min.js"></script>-->
		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

		<!--include('layouts.pusher')-->

		<script>
	        window.Laravel = {!! json_encode([
	            'csrfToken' => csrf_token(),
	        ]) !!};
	    </script>
	    <style type="text/css">
	    	body {
			    font-family: RobotoDraft,Roboto,sans-serif;
			    -webkit-font-smoothing: antialiased;
			}	
			.ui-autocomplete { z-index:99999999999999!important; min-width: 400px!important;}  
	    </style>

	    <script type="text/javascript">
	    	function number_format(amount, decimals) {

				amount += ''; // por si pasan un numero en vez de un string
				amount = parseFloat(amount.replace(/[^0-9\.\-]/g, '')); // elimino cualquier cosa que no sea numero o punto

				decimals = decimals || 0; // por si la variable no fue fue pasada

				// si no es un numero o es igual a cero retorno el mismo cero
				if (isNaN(amount) || amount === 0) 
				    return parseFloat(0).toFixed(decimals);

				// si es mayor o menor que cero retorno el valor formateado como numero
				amount = '' + amount.toFixed(decimals);

				var amount_parts = amount.split('.'),
				    regexp = /(\d+)(\d{3})/;

				while (regexp.test(amount_parts[0]))
				    amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

			return amount_parts.join('.');
			}
	    </script>

	    <style type="text/css">
	    	body.smart-style-6 .table>tbody>tr>td, body.smart-style-6 .table>tbody>tr>th, body.smart-style-6 .table>tfoot>tr>td, body.smart-style-6 .table>tfoot>tr>th, body.smart-style-6 .table>thead>tr>td, body.smart-style-6 .table>thead>tr>th {
					padding: 8px 10px;
					font-size: 12px;
	    		}

	    		body.smart-style-6 .login-info {
				    height: 110px;
				    background: #FFF;
				    margin-top: -1px!important;
				    -webkit-background-size: cover;
				    -moz-background-size: cover;
				    -o-background-size: cover;
				    background-size: cover;
				    border: 0;
				}



				body.smart-style-6 .login-info img {
				    border-radius: 0%;
				    min-width: 30px;
				    width: 90px;
				    max-width: 90%;
				    max-height: 90px;
				    min-height: 50px;
				    /*padding: 3px;*/
				    border: 0px solid rgba(0,0,0,.14);
				    /*box-sizing: content-box;*/
				}

				body.smart-style-6 .login-info a span {
				    display: block;
				    background: rgba(0,0,0,.2);
				    width: 100%;
				    max-width: 100%;
				    padding: 5px 10px;
				    margin-left: -10px;
				    margin-top: 2px;
				    color: #fff;
				}

				/*body.smart-style-6 .minifyme {
				    background: #FC1F24;
				    color: #FFF;
				    position: absolute;
				    width: 29px;
				    border-radius: 50%;
				    z-index: 999;
				    right: 0;
				    padding: 1px 3px;
				    border-bottom: 1px solid #3D6A8A;
				}*/

				.popover{
					z-index: 999999;
				}

				.MessageBoxMiddle {
				    position: relative;
				    left: 10%;
				    width: 90%;
				}

				.page-footer {
				    height: 70px;
				}

				body.smart-style-6 .minifyme {
				    position: relative;
				    top: 30px;
				    left: 206px;
				}

				#ribbon{padding: 10px 46px;}

				/*.fa-mobile-phone:before, .fa-mobile:before, .fa-envelope-square:before {
				    content: "\f10b";
				    top: 4px;
				    position: relative;
				    padding: 3px;
				}*/

				/*.hide-phone{font-size: 19px;
				    font-weight: 800;
				    text-transform: uppercase;
				    color: #fff;
				}*/

	    	
	    </style>
</head>

<body class="smart-style-6">
<!--<body class=" ">-->
 
<header id="header">
	<!--include('layouts/header')-->
</header>
 

<aside id="left-panel">
	<!--include('layouts/aside')-->
</aside> 

 
<!-- MAIN PANEL -->
<div id="main">
	<!--<div id="main">-->
	<!-- RIBBON -->
	<div id="ribbon">
		<!-- breadcrumb -->
	</div><!-- END RIBBON -->
	<!-- MAIN CONTENT -->
	 
	<div id="content"> 
		<!--<div id="notificiones_realtime" class="alert alert-success">App en Tiempo Real</div>-->
		<!--yield('content')-->
	</div>
	<!-- END MAIN CONTENT -->
	<!--</div>-->

	<!-- END MAIN PANEL -->
</div>

<div class="page-footer">
    <!--include('layouts/footer')-->
</div>
 

<!--include('layouts/shortcut')-->

<?php 
/*use App\Models\TablaSistema\CuadroDialogo;

$cuadros = CuadroDialogo::where("anulado",0)->get(); 

foreach($cuadros as $filas): 
 if($filas->controlador!=''){ *
?>

<div id="MyModal<?php //	echo $filas->div_id; ?>" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		  <!--<div class="modal-header">
		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="MyModal<?php //echo $filas->div_id; ?>BtnClose">×</button>
		    <h4 class="modal-title"><?php //echo $filas->tittle; ?></h4>
		  </div>-->
		  <div class="modal-body">
		    <div id="body_modal_<?php //	echo $filas->div_id; ?>" style="width: 100%;min-height: 350px;" >
		         
		   
		    </div>
		    <!--<div class="modal-footer">
		      <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_modal_<?php //echo $filas->div_id; ?>_close">Cerrar</button>
		      
		    </div>-->
		  </div>
		</div>
	</div>
</div>


<?php/* } endforeach;*/ ?>



<!--include('layouts/ventanas_modal')-->



<script type="text/javascript">

</script>


<!--include('layouts/DefaultPageScript')-->
<!--stack("scripts")-->


</body>
</html>