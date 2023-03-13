<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => 'required|email',
            'FNAME' => 'required',
            'LNAME' => 'required'
        ]);
        
        try {
            $newsletter->subscribe([
                'email' => request('email'),
                'FNAME' => request('FNAME'),
                'LNAME' => request('LNAME'),
            ]);
    
        } catch (\Exception $e){
            throw ValidationException::withMessages([
                'email' => 'Este email não pode ser adicionado na nossa lista de newsletter.'
            ]);
        }
    
        return redirect('/')
            ->with('success', 'Você está inscrito na nossa Newsletter');
    }
}
