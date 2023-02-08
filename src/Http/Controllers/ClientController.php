<?php

namespace Companue\ServiceAdapter\Http\Controllers;

use Companue\ServiceAdapter\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('register');
    }

    public function get(Request $request)
    {
        return $request->user();
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'key' => 'required'
        ]);

        $registered_client = null;
        // Check registered users
        if (Client::where('name', $request->name)->count() === 1) {
            $registered_client = Client::where('name', $request->name)->sole();
            if ($registered_client->tokens->count() > 0)
                return response(['message' => 'client already registered!'], 406);
        }

        // Check key
        if ('base64:' . $request->key . '=' !== env('APP_KEY'))
            return response(['message' => 'invalid key'], 401);


        $user = $registered_client ?? Client::create([
            "name" => $request->name,
            "url" => $request->host(),
        ]);

        $token = $user->createToken('API access token');
        $message = $registered_client ? 'token issued'  : 'registered & token issued';

        return response(['message' => $message, 'token' => $token->plainTextToken]);
    }
}
