<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    protected $table = 'todo_lists'; // Specifica il nome della tabella, se diverso dal nome del modello

    protected $fillable = ['name', 'description']; // Definisci i campi che possono essere riempiti

    // Altre definizioni di relazioni o metodi del modello possono essere aggiunte qui

}
