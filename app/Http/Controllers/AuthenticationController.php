<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        // if ($request->isJson()) {
        
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                dd('entro');
            } else {
                dd('entro al else');
            }
        // } else {
        //     return response()->json(['error' => 'Forbidden'], 403);
        // }
    }
}
