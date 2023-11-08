<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    // Restituisce tutte le todolist nella view
    public function index()
    {
        $todos = TodoList::all();
        return view('todos.todos', ['todos' => $todos]);
    }

    // Mostra il form di creazione di una nuova todolist
    public function create()
    {
        return view('todos.create');
    }

    // Salva una nuova todolist
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            // Altri campi necessari per la creazione
        ]);

        TodoList::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            // Altri campi necessari per la creazione
        ]);

        return redirect()->route('todos.index')->with('success', 'Todolist creata con successo');
    }

    // Mostra il form di aggiornamento di una todolist
    public function edit($id)
    {
        $todo = TodoList::find($id);
        if (!$todo) {
            return redirect()->route('todos.index')->with('error', 'Todolist non trovata');
        }

        return view('todos.edit', compact('todo'));
    }

    // Aggiorna una todolist esistente
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            // Altri campi necessari per l'aggiornamento
        ]);

        $todo = TodoList::find($id);
        if (!$todo) {
            return redirect()->route('todos.index')->with('error', 'Todolist non trovata');
        }

        $todo->name = $request->input('name');
        $todo->description = $request->input('description');
        // Altri campi necessari per l'aggiornamento
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Todolist aggiornata con successo');
    }

    // Elimina una todolist esistente
    public function destroy($id)
    {
        $todo = TodoList::find($id);
        if (!$todo) {
            return redirect()->route('todos.index')->with('error', 'Todolist non trovata');
        }

        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todolist eliminata con successo');
    }
}
