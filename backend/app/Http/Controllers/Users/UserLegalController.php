<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserLegalController extends Controller
{
    public function index(Request $request)
    {
        $daftar_user = User::all();

        return Response()->json([
            'status' => 1,
            'pid' => 'fetchdata',
            'daftar_user' => $daftar_user,
            'message' => 'Fetch data daftar user berhasil'
        ],200);
    }
}