@extends('layouts.niceadmin')

    @section('content')
    <div class="pagetitle">
      <h1>Form Layouts</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{url('ventas')}}">menu</a></li> 
        </ol>
      </nav>
    </div><!-- End Page Title -->

        <h2>Listado de Productos</h2>
        <a href="{{ route('ventas.create') }}" class="btn btn-primary">Vender</a>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th> 
                    <th>referencia id</th>
                    <th>referencia</th>
                    <th>cantidad</th>
                    <th>categoria</th>
                    <th>created_at</th> 
                    <th>opción</th> 

                </tr>
            </thead>
            <tbody>
                @if (isset($ventas))

                @foreach ($ventas as $fila)
                    <tr>
                        <td>{{ $fila->id }}</td> 
                        <td>{{ $fila->productos_id }}</td>
                        <td>{{ $fila->referencia }}</td>
                        <td>{{ $fila->cantidad }}</td> 
                        <td>{{ $fila->categoria }}</td>
                        <td>{{ $fila->created_at }}</td> 
                        <td>
                            <a href="{{ url('ventas/edit', $fila->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ url('ventas/destroy', $fila->id) }}" method="POST" style="display: inline;">
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