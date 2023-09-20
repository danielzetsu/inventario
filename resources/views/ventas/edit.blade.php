@extends('layouts.niceadmin')

    @section('content')
    <div class="pagetitle">
      <h1>Form Layouts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{url('ventas')}}">menu</a></li>
          <li class="breadcrumb-item active">Crear</li>
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
                <form class="row g-3" id="fx" name="fx"  method="POST" >
                    <!--csrf -->
                                        {{ method_field('POST') }}
                                        {{ csrf_field() }}  
                <div class="col-md-12">
                    
                  <label for="inputText" class="form-label">Referencias</label>
                      <div class="form-floating mb-3">
                        <select class="form-select" id="productos_id" name="productos_id" aria-label="Referencias">
                          <option value="" selected>seleccione una articulo </option>
                            @foreach ($articulos as $fila)
                                <option value="{{$fila->id}}">{{$fila->referencia}}</option>
                            @endforeach 
                        </select> 
                      </div> 
                </div>

                <div class="col-md-12">
                  <label for="inputNumber" class="form-label">Cantidad</label>
                  <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{$ventas->cantidad}}">
                </div> 

                <div class="col-md-12">
                  <label for="inputNumber" class="form-label">precio</label>
                  <input type="number" class="form-control" id="precio" name="precio" disabled="disabled" >
                </div> 

                <div class="text-center">
                  <button type="submit" id="guardar"    class="btn btn-primary">Guardar</button>
                  <button type="reset" id="reset" class="btn btn-secondary">Limpiar</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>
        <div id="mensajes"></div>
      </div>
    </section>

 




<script type="text/javascript">


jQuery(document).ready(function() {
      jQuery("#productos_id").val({{$ventas->productos_id}});
        jQuery("#productos_id").change(function(){ 
            var id  = jQuery("#productos_id").val();
            if (id!="") {
                var jqXHR = jQuery.ajax({
                      type: "POST",
                      url: "{{url('ventas/change')}}/"+id,
                      data:   { op : true  ,id:id ,_token: jQuery("input[name='_token']").val()},
                      success: function(data) {
                          jQuery( '#mensajes' ).html("");
                          jQuery( '#mensajes' ).html(data);
                      },
                      error: function(data) {
                          jQuery('#mensajes').html("Error Enviando parametros....." + data); 
                      }
                  });
            }
        });

        jQuery("#guardar").click(function(e){


              jQuery("#guardar").attr("disabled","disabled");

              jQuery("#cancelar").attr("disabled","disabled");
              var id = {{$id}}
              datos = jQuery("#fx").serialize();  
              var jqXHR = jQuery.ajax({
                    type: "POST",
                    url: "{{url('ventas/update')}}/"+id,
                    data: datos/* {
                      productos_id : jQuery("#productos_id").val(),
                      cantidad : jQuery("#Cantidad").val(),
                      _token : jQuery("input[name='_token']").val()
                    }*/,
                    success: function(data) {
                        jQuery( '#mensajes' ).html("");
                        jQuery( '#mensajes' ).html(data);
                        jQuery("guardar").removeAttr("disabled");
                    },
                    error: function(data) {
                        jQuery('#mensajes').html("Error Enviando parametros....." + data);
                        jQuery('#mensajes').dialog("open");
                        jQuery("guardar").removeAttr("disabled");
                    }
                });


      });
        jQuery("#reset").click(function(e){ 
                        jQuery("guardar").removeAttr("disabled");

        });



});
</script>

@stop