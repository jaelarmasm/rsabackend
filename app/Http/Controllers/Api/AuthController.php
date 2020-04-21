<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $http = new \GuzzleHttp\Client();

        try {
            $response = $http->post(env('APP_URL').'/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => env('OAUTH_PWD_GRANT_CLIENT_ID'),
                    'client_secret' => env('OAUTH_PWD_GRANT_CLIENT_SECRET'),
                    'username' => $username,
                    'password' => $password,
                    'scope' => ''
                ],
            ]);

            $token = json_decode((string) $response->getBody(), true);
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            if ($exception->getResponse()->getStatusCode() === 401) {
                return response()->json('Invalid email/password combination', 401);
            }

            throw $exception;
        }

        return response()->json($token);
    }
}
