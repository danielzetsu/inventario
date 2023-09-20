@extends('layouts.niceadmin')

    @section('content')
    <div class="pagetitle">
      <h1>Form Layouts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{url('articulos')}}">menu</a></li> 
        </ol>
      </nav>
    </div><!-- End Page Title -->

        <h2>Listado de Productos</h2>
        <a href="{{ route('articulos.create') }}" class="btn btn-primary">Crear Producto</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>nombre</th>
                    <th>referencia</th>
                    <th>precio</th>
                    <th>peso</th>
                    <th>categoria</th>
                    <th>stock</th>
                    <th>fecha</th>
                    <th>Opción</th> 

                </tr>
            </thead>
            <tbody>
                @if (isset($articulos))

                @foreach ($articulos as $fila)
                    <tr>
                        <td>{{ $fila->id }}</td>
                        <td>{{ $fila->nombre }}</td>
                        <td>{{ $fila->referencia }}</td>
                        <td>{{ $fila->precio }}</td>
                        <td>{{ $fila->peso }}</td>
                        <td>{{ $fila->categoria }}</td>
                        <td>{{ $fila->stock }}</td>
                        <td>{{ $fila->fecha }}</td>
                        <td>
                            <a href="{{ url('articulos/edit', $fila->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ url('articulos/destroy', $fila->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table> 

@stop