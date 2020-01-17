@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <thead>
            <th>Id</th>
            <th>Titulo</th>
            <th>Acción</th>
        </thead>
        <tbody>
            @foreach ($notas as $nota)
                <tr>
                    <td>{{$nota->id}}</td>
                    <td>{{$nota->titulo}}</td>
                    <td>
                        @can('eliminar notas')
                            <a href="{{ route('eliminar', $nota->id) }}">Eliminar Nota</a>
                                
                        @else
                            Hola
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
