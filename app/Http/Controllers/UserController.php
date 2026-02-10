<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Traer todos los usuarios (puedes añadir paginación después)
        $users = User::all();                

        // Retornar una vista con los usuarios
        return view('users.index', compact('users'));
    }
}
