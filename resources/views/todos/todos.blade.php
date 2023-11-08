@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Lista dei Todo</h1>
    <a href="{{ route('todos.create') }}" class="btn btn-success mb-3">Crea Todo</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($todos as $todo)
            <tr>
                <td>{{ $todo->name }}</td>
                <td>{{ $todo->description }}</td>
                <td>
                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary">Modifica</a>
                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questo Todo?')">Elimina</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
