 
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


              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $mensaje }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>

		@endforeach
	@endif
@endif 


@if(isset($guardar) )

	@if( $guardar==true )
		<script type="text/javascript">

						url="{{ url('ventas')}}";
						jQuery(location).attr('href',url); 


			/*open Modal respuesta, cerrar , seguiminetos*/ 

		</script>
	@endif
@endif
  


