@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Modifica Todo</h1>
    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $todo->name }}">
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea name="description" id="description" class="form-control">{{ $todo->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Aggiorna</button>
    </form>
</div>
@endsection
