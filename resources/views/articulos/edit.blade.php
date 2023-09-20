@extends('layouts.niceadmin')

    @section('content')
    <div class="pagetitle">
      <h1>Form Layouts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{url('articulos')}}">menu</a></li>
          <li class="breadcrumb-item active">Editar</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <section class="section">
      <div class="row">
        <div class="col-lg-6">
 

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Editar Productos</h5>

              <!-- Multi Columns Form -->
                <form class="row g-3"  method="POST" action=" {{ url('articulos/update', $productos->id) }}">
                    <!--csrf -->

                                        {{ method_field('POST') }}
                                        {{ csrf_field() }}  
                <div class="col-md-12">
                  <label for="inputName5" class="form-label">Nombre de producto</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" value="{{$productos->nombre}}">
                </div>
                <div class="col-md-12">
                  <label for="inputText" class="form-label">Referencia</label>
                  <input type="text" class="form-control" id="referencia" name="referencia" value="{{$productos->referencia}}">
                </div>
                <div class="col-md-6">
                  <label for="inputNumber" class="form-label">Precio</label>
                  <input type="number" class="form-control" id="precio" name="precio" value="{{$productos->precio}}">
                </div>
                <div class="col-md-6">
                  <label for="inputNumber" class="form-label">Peso</label>
                  <input type="number" class="form-control" id="peso" name="peso" value="{{$productos->peso}}">
                </div>
                <div class="col-md-12">
                  <label for="inputText" class="form-label">Categoría</label>
                  <input type="text" class="form-control" id="categoria" name="categoria" value="{{$productos->categoria}}">
                </div> 

                <div class="col-md-6">
                  <label for="inputNumber" class="form-label">Stock</label>
                  <input type="number" class="form-control" id="stock" name="stock" value="{{$productos->stock}}">
                </div>
                <div class="col-md-6">
                  <label for="inputDate" class="form-label">Fecha</label>
                  <input type="date" class="form-control" id="fecha" name="fecha"   value="{{$productos->fecha}}">
                </div>

                <div class="text-center">
                  <button type="submit" id="guardar"    class="btn btn-primary">Guardar</button>
                  <button type="reset" class="btn btn-secondary">Limpiar</button>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

        </div>
        <div id="mensajes"></div>
      </div>
    </section>
@stop