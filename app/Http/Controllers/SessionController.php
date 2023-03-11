<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function store()
    {
        $attributes = request()->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if(! auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'username' => 'Usuário ou senha incorretos'
            ]);
        }

        session()->regenerate();
        return redirect('/')->with('success', 'Bem vindo de volta');
        
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logout realizado com sucesso!');
    }
}
