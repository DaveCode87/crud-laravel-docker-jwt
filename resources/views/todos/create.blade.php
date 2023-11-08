@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Crea un nuovo Todo</h1>
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Descrizione:</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crea</button>
    </form>
</div>
@endsection
