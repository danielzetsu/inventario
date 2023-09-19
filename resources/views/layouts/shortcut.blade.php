<div id="shortcut">
	<ul>
		<!--<li>
			<a href="{{url('modulo_default')}}" id="modulo_default" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-shopping-cart fa-4x"></i> <span>Administrativo </span> </span> </a>
		</li>
		<li>
			<a href="{{url('cambiar').'/default'}}" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Ventas Pos </span> </span> </a>
		</li>
		<li>
			<a href="{{url('modulo_credito')}}" id="modulo_credito" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-institution fa-4x"></i> <span>Credito </span> </span> </a>
		</li>
		<li>
			<a href="{{url('modulo_inmobiliaria')}}" id="modulo_inmobiliaria" class="jarvismetro-tile big-cubes bg-color-red"> <span class="iconbox"> <i class="fa fa-building fa-4x"></i> <span>Inmobiliaria </span> </span> </a>
		</li>
		<li>
			<a href="#/intranet/seccion/cambiar/?id=mercancia" class="jarvismetro-tile big-cubes bg-color-green"> <span class="iconbox"> <i class="fa fa-truck fa-4x"></i> <span>Inventarios <--<span class="label pull-right bg-color-darken">14</span>-></span> </span> </a>
		</li> 
		<li>
			<a href="{{url('modulo_contabilidad')}}" id="modulo_contabilidad" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-bar-chart-o fa-4x"></i> <span>Contabilidad </span> </span> </a>
		</li>-->		
		<!--<li>
			<a href="{{url('informes/modulo_informes')}}" id="modulo_contabilidad" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-bar-chart-o fa-4x"></i> <span>Informes </span> </span> </a>
		</li>-->
		@if( strtoupper(\Session::get("rol_codigo") ) == strtoupper("SUPERADMINISTRADOR") )
		<!--<li>
			<a href="{{url('perfil')}}" id="modulo_perfil" class="jarvismetro-tile big-cubes bg-color-red"> <span class="iconbox"> <i class="fa fa-gears fa-4x"></i> <span>Conf. App</span> </span> </a>
		</li>-->
		@endif
		<!--<li>
			<a href="{{url('perfil')}}" id="modulo_perfil" class="jarvismetro-tile big-cubes bg-color-red"> <span class="iconbox"> <i class="fa fa-gears fa-4x"></i> <span>Conf. App</span> </span> </a>
		</li>-->
		<li>
			<a href="{{url('perfil')}}" id="modulo_perfil" class="jarvismetro-tile big-cubes bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>Mi Perfil </span> </span> </a>
		</li>
	</ul>
</div>