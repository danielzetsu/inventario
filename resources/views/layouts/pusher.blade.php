<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
@include('conexion_pusher')
<script>

	<?php 
		$user_id      = \Auth::id();
    	$usuario      = App\User::find($user_id);
    	$empresa_id   = $usuario->empresa_id;
    ?>


    // Enable pusher logging - don't include this in production
    /*Pusher.logToConsole = true;

    var pusher = new Pusher("{{env('PUSHER_APP_KEY') }}", {
    			   cluster: "{{env('PUSHER_APP_CLUSTER') }}"
    });*/

    var channel  = pusher.subscribe('channel-users-suscribers');
	var channel2 = pusher.subscribe('channelsolicitudcredito');
	var channel3 = pusher.subscribe('channelcorreofacturaelectronica');

	channel.bind("pusher:subscription_succeeded", (data) => {
	 	 // add new price into the APPL widget
	});

	channel2.bind("pusher:subscription_succeeded", (data) => {
	  // add new price into the APPL widget
	});

	channel.bind("UserSessionChanged", (data) => {
	  // add new price into the APPL widget
	   /*if(data.type=='login'){
			jQuery("#notificiones_realtime").removeClass("alert-success");
			jQuery("#notificiones_realtime").removeClass("alert-danger");
      		jQuery("#notificiones_realtime").addClass("alert-success");
      	}
      	if(data.type=='logout'){
			jQuery("#notificiones_realtime").removeClass("alert-success");
			jQuery("#notificiones_realtime").removeClass("alert-danger");
      		jQuery("#notificiones_realtime").addClass("alert-danger");
      	}*/
      	jQuery("#ribbon").html("Usuario Logueado : " + data.user.username );	
	});

	channel2.bind("EnviarSolicitudFabricaEvent", (data) => {
	  // add new price into the APPL widget
	  	console.log("EnviarSolicitudFabricaEvent");

    	var datos1 = JSON.stringify(data);
	    var datos_temp = jQuery.parseJSON(datos1);
	    var user  = datos_temp.user;
	    var datos = datos_temp.datos;

	    //var codigo = datos_temp.datos;

	    jQuery("#div_listar_analisis_solicitudes_nuevas").show();
	    var numero = jQuery("#div_listar_analisis_solicitudes_nuevas_numero").html();

	    if(numero==''){
			jQuery("#div_listar_analisis_solicitudes_nuevas_numero").html("1");
	    }else{
	    	numero = parseInt(numero)+1;
	    	jQuery("#div_listar_analisis_solicitudes_nuevas_numero").html(numero);
	    }
	    console.log("borrando tr_estado_solicitud_credito_ "+datos.solicitud);
	    jQuery("#tr_estado_solicitud_credito_"+datos.solicitud).remove();
	    //jQuery("#btn_refresh_grid_solicitud_credito").click();
	});

	channel2.bind("RadicacionFabricaEvent", (data) => {
	  // add new price into the APPL widget
	  	console.log("RadicacionFabricaEvent");

    	var datos1 = JSON.stringify(data);
	    var datos_temp = jQuery.parseJSON(datos1);
	    var user  = datos_temp.user;
	    var datos = datos_temp.datos;

	    var empleados_id = "{{$usuario->empleados_id}}";
	    if(empleados_id == datos.empleados_id){
    		jQuery.smallBox({
				title : "Información",
				content : "<i class='fa fa-clock-o'></i> <i> El credito "+datos.solicitud+" a nombre de "+datos.nom_cliente+" fue radicado por la fabrica de creditos</i>",
				color : "#3276b1",
				iconSmall : "fa fa-warning shake animated",
				timeout : 3000,
				sound_file: "../../../../SmartAdmin/sound/smallbox"
			});

	    }

	    jQuery("#div_estado_solicitud_credito_"+datos.solicitud).html("<span class=\"label label-success\">Radicacion</span>");
	   
	});

	channel2.bind("EmpezarEstudioEvent", (data) => {
	  // add new price into the APPL widget
	  	console.log("EmpezarEstudioEvent");

    	var datos1 = JSON.stringify(data);
	    var datos_temp = jQuery.parseJSON(datos1);
	    var user  = datos_temp.user;
	    var datos = datos_temp.datos;

	    var empleados_id = "{{$usuario->empleados_id}}";
	    if(empleados_id == datos.empleados_id){
    		jQuery.smallBox({
				title : "Información",
				content : "<i class='fa fa-clock-o'></i> <i> El credito "+datos.solicitud+" a nombre de "+datos.nom_cliente+" pasa a Consultas varias y Data</i>",
				color : "#3276b1",
				iconSmall : "fa fa-warning shake animated",
				timeout : 3000,
				sound_file: "../../../../SmartAdmin/sound/smallbox"
			});

	    }

	    jQuery("#div_estado_solicitud_credito_"+datos.solicitud).html("<span class=\"label label-success\">Consultas y Data</span>");
	   
	});

	channel2.bind("EmpiezaRevisionYScore", (data) => {
	  // add new price into the APPL widget
	  	console.log("EmpiezaRevisionYScore");

    	var datos1 = JSON.stringify(data);
	    var datos_temp = jQuery.parseJSON(datos1);
	    var user  = datos_temp.user;
	    var datos = datos_temp.datos;

	    var empleados_id = "{{$usuario->empleados_id}}";
	    if(empleados_id == datos.empleados_id){
    		jQuery.smallBox({
				title : "Información",
				content : "<i class='fa fa-clock-o'></i> <i> El credito "+datos.solicitud+" a nombre de "+datos.nom_cliente+" pasa a Revision y Score</i>",
				color : "#3276b1",
				iconSmall : "fa fa-warning shake animated",
				timeout : 3000,
				sound_file: "../../../../SmartAdmin/sound/smallbox"
			});

	    }

	    jQuery("#div_estado_solicitud_credito_"+datos.solicitud).html("<span class=\"label label-info\">Revision y Score</span>");
	   
	});

	channel2.bind("EmpiezaReferenciacion", (data) => {
	  // add new price into the APPL widget
	  	console.log("EmpiezaReferenciacion");

    	var datos1 = JSON.stringify(data);
	    var datos_temp = jQuery.parseJSON(datos1);
	    var user  = datos_temp.user;
	    var datos = datos_temp.datos;

	    var empleados_id = "{{$usuario->empleados_id}}";
	    if(empleados_id == datos.empleados_id){
    		jQuery.smallBox({
				title : "Información",
				content : "<i class='fa fa-clock-o'></i> <i> El credito "+datos.solicitud+" a nombre de "+datos.nom_cliente+" pasa a Referenciación</i>",
				color : "#3276b1",
				iconSmall : "fa fa-warning shake animated",
				timeout : 3000,
				sound_file: "../../../../SmartAdmin/sound/smallbox"
			});

	    }

	    jQuery("#div_estado_solicitud_credito_"+datos.solicitud).html("<span class=\"label label-info\">Referenciación</span>");
	   
	});


	channel3.bind("CorreoFacturaElectronicaSincronizadoEvent", (data) => {
	  // add new price into the APPL widget
	  	console.log("CorreoFacturaElectronicaSincronizadoEvent");

    	var datos1 = JSON.stringify(data);
	    var datos_temp = jQuery.parseJSON(datos1);
	    //var user  = datos_temp.user;
	    var empresa_id = "{{$empresa_id}}";
	    var datos = datos_temp.datos;

	    if(datos.empresa_id == empresa_id){
	    	console.log(datos);
	    	console.log(datos.respuesta);
	    	jQuery("#div_leer_correo_socket").html(datos.respuesta);
	    }
	    
	});


	/*channel2.bind("RadicacionFabricaEvent", (data) => {
	  	console.log("RadicacionFabricaEvent");
	});*/

</script>