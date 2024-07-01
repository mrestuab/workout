<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = request(['email','password']);

        if(auth()->attempt($credentials)){
            $token = Auth::guard('api')->attempt($credentials);
            return response()->json([
                'succes' => true,
                'message' => 'login berhasil',
                'token' => $token
            ]);
        }


        return response()->json([
            'succes' => false,
            'message' => 'email atau password salah'
        ]);
    }

    protected function respondWithToken($token){
        return response()->json([
            'acces_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL()*60
        ]);
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json(
                $validator->errors(),
                422
            );
        }

        $input = $request->all();
        $input['password'] = bcrypt($request->password);
        // unset($input['konfirmasi_password']);
        $member = User::create($input);
        return response()->json([
            'data' => $member
        ]);
    }

    public function logout(){
        Session::flush();
        return redirect()->to('/');
    }

    public function logout_admin(){
        Session::flush();
        return redirect('/login-admin');
    }
}
