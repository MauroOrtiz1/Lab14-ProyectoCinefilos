@extends('layouts.app')

@section('content')
<a class="text-dark" href="/payments/{{$pelicula->id}}">{{$pelicula->titulo}}</a>

    <div class="container">
    <form action="{{ route('subirEntrada') }}" method="POST" enctype="multipart/form-data" class="row g-3">

        <h2>Película: {{ $pelicula->titulo }}</h2>

        <h4>Horarios Disponibles</h4>

        @foreach($horario as $horario)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="horario_id" value="{{ $horario->id }}" required>
                <label class="form-check-label">
                    Fecha: {{ $horario->fecha }}, Hora: {{ $horario->hora }}, Sala: {{ $horario->sala->numero_sala }}
                </label>
            </div>
        @endforeach

        <h4>Escoge el asiento:</h4>
        <input class="form-control" type="text" name="n°_asiento" placeholder="Agrege el número de asiento" required>
        <br>
        <button type="submit" class="btn btn-primary">Subir</button>
    </form>
    </div>
@endsection