<?php

namespace Companue\ServiceAdapter\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function get(Request $request)
    {
        return [
            'request' => $request->ip(),
            'message' => 'Yes I am',
        ];
    }

    public function post(Request $request)
    {
        return [
            'request' => $request->ip(),
            'message' => 'Yes I am',
            'data' => $request->all()
        ];
    }
}
