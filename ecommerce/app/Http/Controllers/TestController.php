<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function test(){
            $user = Auth::user();
            echo json_encode([
                'user' => $user
            ]);
    }
}
