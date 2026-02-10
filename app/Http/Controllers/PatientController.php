<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::orderBy('apellidos')->orderBy('nombre')->paginate(15);
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'tipo_documento' => 'nullable|string|max:20',
            'numero_documento' => 'nullable|string|max:50',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|string|max:20',
            'telefono' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'direccion' => 'nullable|string',
            'notas' => 'nullable|string',
        ]);

        Patient::create($validated);

        return redirect()->route('patients.index')
            ->with('success', __('Paciente registrado correctamente.'));
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'tipo_documento' => 'nullable|string|max:20',
            'numero_documento' => 'nullable|string|max:50',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|string|max:20',
            'telefono' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'direccion' => 'nullable|string',
            'notas' => 'nullable|string',
        ]);

        $patient->update($validated);

        return redirect()->route('patients.index')
            ->with('success', __('Paciente actualizado correctamente.'));
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index')
            ->with('success', __('Paciente eliminado correctamente.'));
    }
}
