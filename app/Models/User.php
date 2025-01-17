<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class User extends Model
{
    use HasFactory;

    public static function getAuthUser()
    {
        if (!session('auth')) {
            return to_route('app');
        }

        return session('auth');
    }

    public static function getLogin()
    {
        $authUser = self::getAuthUser();

        return $authUser['login'];
    }

    public static function getToken()
    {
        $authUser = self::getAuthUser();

        return $authUser['token'];
    }

    public static function login($input)
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->withBody(
            json_encode([
                'login' => $input['login'],
                'senha' => $input['senha']
            ]),
            'application/json'
        )->post('http://200.135.58.39:5000/login');

        return $response->json();
    }

    public static function addUserSession($authUser)
    {
        Session::put('auth', ['login' => $authUser['login'], 'token' => $authUser['detalhes']]);
    }

    public static function deleteUserSession()
    {
        Session::remove('auth');
    }

    public static function search($search)
    {
        $token = self::getToken();

        $response = Http::withHeaders([
            'Authorization' => "Bearer ".$token,
        ])->get("http://200.135.58.39:5000/consultar/patente/$search")->json();

        return $response;
    }
}
