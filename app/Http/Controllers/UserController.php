<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();

        // dd($input);

        $patente = isset($input['patente']) ? $input['patente'] : '';

        // dd($patente);

        $patente = User::search($patente);

        if (!$patente) {
            return to_route('search');
        }

        return view('search', ['data' => $patente]);
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $authUser = User::login($input);

        $authUser['login'] = $input['login'];

        if (!$authUser) {
            return to_route('app');
        }

        User::addUserSession($authUser);

        return to_route('search');
    }

    public function logout()
    {
        User::deleteUserSession();
        
        return to_route('app');
    }
}
