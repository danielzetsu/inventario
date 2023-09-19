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
              <form class="row g-3" action="{{url('articulos/store')}}"  method="POST"  id="{{$form}}" name="{{$form}}" >


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