<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    public function updatefrase(Request $request)
    {
        $user = Auth::user(); // Obtém o usuário autenticado
        $user->frase = $request->input('frase'); // Substitua 'bio' pelo nome do campo que deseja atualizar
        $user->save();
    
        return redirect()->route('perfil')->with('success', 'Bio atualizada com sucesso!');
    }


}





