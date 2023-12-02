@extends('adminlte::page')

@section('title', "Temas")

@section('content_header')
    <h1>Temas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('themes.update', $theme->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $theme->name ?? old('name') }}">
                </div>

                <div class="form-group">
                    <label for="genero">Genero:</label>
                    <select class="custom-select rounded-0" id="genero" name="genero">
                        <option value="0" @if ($theme->gender == 0) selected @endif >Masculino</option>
                        <option value="1" @if ($theme->gender == 1) selected @endif >Feminino</option>
                        <option value="2" @if ($theme->gender == 2) selected @endif >Unissex</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Salvar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
