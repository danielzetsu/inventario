<div class="login-info" align="center">
	<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
		
		<a href="javascript:void(0);" id="show-shortcut" data-action="toggleShortcut">
			<!--<img src="img/avatars/sunny.png" alt="me" class="online"> -->
			@if (Auth::guest())
				<img src="{{ url('/') }}/img/1/logo.png" class="online" alt="Cabarcas Sarmiento sas"  />
			@else
				<?php 
					$user      = \Auth::id();
        			$usuario   = App\User::find($user);
        			$empresa   = App\Models\Empresa::find($usuario->empresa_id); 
        		?>
				<img src="{{ url('/') }}/img/logos/{{$empresa->id}}/logo.png" class="online" alt="{{$empresa->nombre_empresa}}" style="width: 90%;"  />
			@endif
			<span>
				@if (Auth::guest())
					Usuario no Logueado 
				@else
				 	{{ Auth::user()->name }}
				@endif
			</span>
			<i class="fa fa-angle-down"></i>
		</a> 
		
	</span>
</div>
<span data-action="minifyMenu" class="minifyme"> 
<i class="fa fa-arrow-circle-left hit"></i> 
</span>
<?php $aplicacion = "ventas";

$sql ="SELECT * from intranet.dbo.menu where posicion_x > 0 and 1= 2 order by orden asc";
$sql2 = "SELECT * from intranet.dbo.menu where posicion_x > 0 and ( aplicacion='$aplicacion' or aplicacion='laravel' ) and posiciones_id = 'left' and (seccionesapp_id = 'laravel' or seccionesapp_id = 'ventas' ) and 1= 1 and anulado=0 order by orden asc";
$result = \DB::select($sql2); 
//echo "SELECT * from menu where posicion_x > 0 and (aplicacion='default' or aplicacion='$aplicacion' ) order by orden asc";
//$menu = new Menu();
//$y = new Menu();
//echo "<pre>$sql2</pre>";
$html="";
$html.= "<nav>";
$html.= "<ul style=''>";

foreach( $result as $fila ){
			$ymenu = \DB::select("SELECT * from intranet.dbo.menu where anulado =0 and  posicion_y = '$fila->posicion_x' and anulado=0  and (aplicacion='laravel' or aplicacion='$aplicacion' ) and (seccionesapp_id = 'laravel' or seccionesapp_id = 'ventas' ) order by orden asc");
			$html.= "<li class=''> \n";
				$html.= "<a href='".url($fila->url)."' title='$fila->tittle'> \n";
						$html.= "<i class='$fila->iconsleft'></i> \n";
						$html.= "<span class='menu-item-parent'>$fila->descripcion</span>";
				$html.= "</a>";
				$html.= "<ul>";
					foreach($ymenu as $y_menu):		
						$html.= "<li>
									<a href='".url($y_menu->url)."'>
										<i class=' ".$y_menu->iconsleft."'></i> 
										<span class='menu-item-parent'>".$y_menu->descripcion." </span>
									</a>
								</li>"; 
					endforeach;		
				$html.= "</ul>";		
			$html.= "</li>";

}
$html.= "</ul>";
$html.= "</nav>";
echo $html;

?>
