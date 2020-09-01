<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\User;

class UserSuperAdminController extends Controller
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|string|email|unique:users',
            'nomor_hp'=>'required|string|unique:users',
            'username'=>'required|string|unique:users',
            'password'=>'required',
        ]);
        $now = \Carbon\Carbon::now()->toDateTimeString();
        $user = User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'nomor_hp'=>$request->input('nomor_hp'),
            'username'=>$request->input('username'),
            'password'=>$request->input('password'),
            'email_verified_at'=>\Carbon\Carbon::now(),
            'created_at'=>$now,
            'updated_at'=>$now
        ]);
        //$role='superadmin';
        //$user->assignRole($role);

        return Response()->json([
            'status'=>1,
            'pid'=>'store',
            'user'=>$user,
            'message'=>'Data User berhasil disimpan.'
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(is_null($user))
        {
            return response()->json([
                'status'=>1,
                'pid'=>'update',
                'message'=>["User ID ($id) gagal diupdate"]
            ], 422);
        }
        else
        {
            $this->validate($request, [
                'name'=>'required',
                'email'=>'required|string|email|unique:users,email,'.$user->id,
                'nomor_hp'=>'required|string|unique:users,nomor_hp,'.$user->id,
                'username'=>'required','unique:users,username,'.$user->id,
                'password'=>'required',
            ]);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->nomor_hp = $request->input('nomor_hp');
            $user->username = $request->input('username');
            if(!empty(trim($request->input('password')))) {
                $user->password = Hash::make($request->input('password'));
            }
            $user->updated_at = \Carbon\Carbon::now()->toDateTimeString();
            $user->save();

            return Response()->json([
                'status'=>1,
                'pid'=>'update',
                'user'=>$user,
                'message'=>'Data User '.$user->username.' berhasil diubah.'
            ], 200);
        }
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);

        if($user instanceof User)
        {
            $username=$user->username;
            $user->delete();
        }

        return Response()->json([
            'status'=>1,
            'pid'=>'destroy',
            'message'=>"User ($username) berhasil dihapus"
        ], 200);
    }
}