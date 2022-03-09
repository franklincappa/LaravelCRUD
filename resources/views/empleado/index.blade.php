@extends('layouts.app')
@section('content')

<div class="container">



    <h1>Listado de Empleados</h1>

    <div class="alert alert-success alert-dismissible" role="alert">
        @if(Session::has('mensaje'))
            {{ Session::get('mensaje')}}
        @endif
        
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>

    <a href="{{ url('empleado/create')}}" class="btn btn-success">Registrar Nuevo empleado</a>

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
            <tr>
                <td>{{$empleado->id}}</td>
                <td>
                    <img src="{{ asset('storage').'/'.$empleado->Foto }}" alt="" width="50px" class="img-thumbnail img-fluid"> 
                </td>
                <td>{{$empleado->Nombre}}</td>
                <td>{{$empleado->ApellidoPaterno}}</td>
                <td>{{$empleado->ApellidoMaterno}}</td>
                <td>{{$empleado->Correo}}</td>
                <td>
                    <a href="{{ url('/empleado/'.$empleado->id.'/edit')}}" class="btn btn-warning">Editar</a>
                    
                    <form action="{{ url('/empleado/'.$empleado->id)}}" method="post" class="d-inline">
                        @csrf
                        {{ method_field('DELETE')}}
                        <input type="submit" onclick="return confirm('Quieres Borrar')" value="Borrar" class="btn btn-danger">
                    </form>
                </td>
            </tr>    
            @endforeach
            
        </tbody>
    </table>
    {!! $empleados->links() !!}

</div>

@endsection
