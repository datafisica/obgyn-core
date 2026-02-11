<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->paginate(15);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        return redirect()->route('users.index')
            ->with('success', __('Usuario registrado correctamente.'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ];

        if ($request->filled('password')) {
            $rules['password'] = ['confirmed', Password::defaults()];
        }

        $validated = $request->validate($rules);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (! empty($validated['password'])) {
            $user->password = $validated['password'];
        }
        $user->save();

        return redirect()->route('users.index')
            ->with('success', __('Usuario actualizado correctamente.'));
    }

    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return redirect()->route('users.index')
                ->with('error', __('No puedes eliminar tu propio usuario.'));
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', __('Usuario eliminado correctamente.'));
    }
}
