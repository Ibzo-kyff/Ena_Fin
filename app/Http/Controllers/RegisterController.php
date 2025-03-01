<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Validator::make($input, [
            'nom_complet' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['required', 'string', 'max:15'],
            'role' => ['required', 'string'],
            'corps' => ['nullable', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();

        User::create([
            'nom_complet' => $input['nom_complet'],
            'email' => $input['email'],
            'telephone' => $input['telephone'],
            'role' => $input['role'],
            'corps' => $input['corps'],
            'password' => Hash::make($input['password']),
        ]);

        return redirect()->route('register')->with('success', 'Utilisateur inscrit avec succès.');
    }
}
