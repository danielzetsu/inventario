@extends('layouts.niceadmin')

    @section('content')
<?php 
$unico_id = uniqid();
$div = "metas_repuestos_".$unico_id;
$form = "form_".$unico_id ;?>  

    <div class="pagetitle">
      <h1>Form Layouts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Layouts</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="col-lg-6">
 

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Crear Productos</h5>

              <!-- Multi Columns Form -->
              <form class="row g-3" action="{{url('articulos')}}"  method="POST"  id="{{$form}}" name="{{$form}}" >


                                        {{ method_field('POST') }}
                                        {{ csrf_field() }}  
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Nombre de producto</label>
                  <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="col-md-12">
                  <label for="inputText" class="form-label">Referencia</label>
                  <input type="text" class="form-control" id="referencia" name="referencia">
                </div>
                <div class="col-md-6">
                  <label for="inputNumber" class="form-label">Precio</label>
                  <input type="number" class="form-control" id="precio" name="precio">
                </div>
                <div class="col-md-6">
                  <label for="inputNumber" class="form-label">Peso</label>
                  <input type="number" class="form-control" id="peso" name="peso">
                </div>
                <div class="col-md-12">
                  <label for="inputText" class="form-label">Categoría</label>
                  <input type="text" class="form-control" id="categoría" name="categoría">
                </div> 

                <div class="col-md-6">
                  <label for="inputNumber" class="form-label">Stock</label>
                  <input type="number" class="form-control" id="stock" name="stock">
                </div>
                <div class="col-md-6">
                  <label for="inputDate" class="form-label">Fecha</label>
                  <input type="date" class="form-control" id="fecha" name="fecha">
                </div>

                <div class="text-center">
                  <button type="submit" id="guardar" name="guardar"  class="btn btn-primary">Guardar</button>
                  <button type="reset" class="btn btn-secondary">Limpiar</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>
        <div id="mensajes"></div>
      </div>
    </section>


@if ($errors->any())
    @if (count($errors) > 0)
           @foreach ($errors->all() as $error)
               <div class="alert alert-danger fade in">
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
                            timeout : 4000,
                            sound_file: "../../../../SmartAdmin/sound/smallbox"
                            });
                        });
                </script>
           @endforeach
    @endif
@endif
<script type="text/javascript">

    @if ($errors->any())
        @if (count($errors) > 0)
               @foreach ($errors->all() as $error)
                        jQuery.smallBox({
                            title : "Alerta",
                            content : "<i class='fa fa-clock-o'></i> <i>{{ $error }}</i>",
                            color : "#C46A69",
                            iconSmall : "fa fa-warning shake animated",
                            timeout : 4000,
                            sound_file: "../../../../SmartAdmin/sound/smallbox"
                        });
               @endforeach
        @endif
    @endif
</script>

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

@if( isset($guardar) )
@if( $guardar==true )
<script type="text/javascript">

    jQuery.bigBox({
            title : "Mensaje Satisfactorio",
            content :"Felicidades Formulario Sagrilaft Ingresado Satisfactoriamente",   
            color : "#739E73",
            timeout: 9000,
            icon : "fa fa-check",
            number : "1",
            sound_file: "../../../../SmartAdmin/sound/smallbox"
        }, function() {
        closedthis();
    }); 

    url="{{ url('consultas/sagrilaft/pdf').'/'.$encabezado->id }}";
    window.open(url);
    @if($encabezado->tipo_persona=='juridica')
        url="{{ url('consultas/sagrilaft')}}?nit_pj={{trim($encabezado->nit)}}";
    @else
        url="{{ url('consultas/sagrilaft')}}?nit={{trim($encabezado->nit)}}";
    @endif
    jQuery(location).attr('href',url);


    //borrar_locales('{{$encabezado->id}}','{{$encabezado->prefijo}}','{{$encabezado->consecutivo}}');
    //url="{{ url('ventas/solicitud_credito/edit')}}/{{$encabezado->id}}";
    //jQuery(location).attr('href',url);

</script>


@endif
@endif
 

@if ($errors->any())
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif
 

@stop