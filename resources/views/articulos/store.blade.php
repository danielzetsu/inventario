@extends('layouts.niceadmin')

    @section('content')

@if ($errors->any())
	@if (count($errors) > 0)

           @foreach ($errors->all() as $error)
               <div class="alert alert-danger">
			       <ul>
			       		<li>{{ $error }}</li> 
			       </ul>
			   </div>  
			   <script type="text/javascript">
			        jQuery(document).ready(function(){
			                $.smallBox({
							title : "Alerta",
							content : "<i class='fa fa-clock-o'></i> <i>{{ $error }}</i>",
							color : "#C46A69",
							iconSmall : "fa fa-warning shake animated",
							timeout : 6000,
							sound_file: "../../../../SmartAdmin/sound/smallbox"
							});
						});
				</script>

				<div class="alert alert-info">

					<footer>
						<a class="btn btn-labeled btn-default" href="{{url('articulos/create')}}">
							<i class="glyphicon glyphicon-remove"></i> Regresar
						</a>
					</footer>
				</div>
					
	  @endforeach
	@endif
@endif
@if(isset($failed))
 	<?php
		foreach (array_keys($failed) as $key ) {
			echo  "<script>jQuery('#".$key."').css('border-bottom-color','rgb(241, 75, 75)');</script>"."\n";
		}

 	 ?>
	
@endif

@if( isset($msg) )
	@if( count($msg) > 0 )
		@foreach ($msg as $mensaje)
			<div class="alert alert-info fade in">
		       	<ul>
		          	<li><i class="fa-fw fa fa-info"></i> <strong>Informacion: </strong> {{ $mensaje }}</li>
		       	</ul>
		   	</div> 
		   	@if( isset($row) )
		   		<script>jQuery( '#valor_referencia_<?php echo $row;?>' ).editable( 'toggleDisabled' ); </script>
		   	@endif
		   	@if( isset($EAN) )
		   		<script>jQuery("#btn-consultar").click(); //jQuery( '#<?php echo $EAN;?>' ).editable( 'toggle' ); </script>
		   	@endif

		   	<script type="text/javascript">
		        jQuery(document).ready(function(){
		                $.smallBox({
						title : "Alerta",
						content : "<i class='fa fa-clock-o'></i> <i>{{ $mensaje }}</i>",
						color : @if( $guardar==true )"#63b04f",@else  "#C46A69", @endif
						iconSmall : "fa fa-warning shake animated",
						timeout : 4000,
						sound_file: "../../../../SmartAdmin/sound/smallbox"
						});
					});
			</script>
		@endforeach
	@endif
@endif 


@if(isset($guardar) )

	@if( $guardar==true )
		<script type="text/javascript">

			jQuery.bigBox({
				title : "Mensaje Satisfactorio",
				content : "Felicidades Actualizado",
				color : "#739E73",
				timeout: 5000,
				icon : "fa fa-check",
				number : "1",
				sound_file: "../../../../SmartAdmin/sound/smallbox"
				}, function() {
				closedthis();
			}); 


			@if(isset($documento_table_import))
					alert('Se actualizó cotizaciones');
					@if($transitotemp>0)  
						url="{{ url('/').'/'.$documento_table_import->base.'?search='.$transitotemp}}";
						jQuery(location).attr('href',url); 
					@endif

			@endif
			/*open Modal respuesta, cerrar , seguiminetos*/ 

		</script>
	@endif
@endif

@endsection  


