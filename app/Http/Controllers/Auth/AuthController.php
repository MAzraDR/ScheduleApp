<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view("login");
    }

    public function register()
    {
        return view("register");
    }

    public function prosesregister(Request $request)
    {
        $payload = $request->only("name", "email", "password");
        $validate = Validator::make($payload, [
            "name" => "required",
            "email" => "required",
            "password" => "required",
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status_code' => 404,
                "message" => $validate->errors(),
            ]);
        }

        $payload["password"] = bcrypt($payload["password"]);

        $user = User::create($payload);
        $token = $user->createToken("auth_token")->plainTextToken;

        return redirect(route('auth.login'));
    }

    public function proseslogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authUser = User::where('email', $request->email)->first();
            
            // Menyimpan data pengguna ke dalam session
            $request->session()->put('userId', $authUser->id);
            $request->session()->put('userName', $authUser->name);
            $request->session()->put('isAdmin', $authUser->isAdmin);
            // Jika Anda memiliki data lain yang ingin disimpan di dalam session, tambahkan di sini
                        
            // Redirect ke halaman dashboard atau halaman lain yang sesuai
            return redirect(route('dashboard'));
        } else {
            return $this->sendError('Unauthorized', ['error' => 'Unauthorized']);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        // Untuk logout dengan menggunakan token API
        $request->user()->tokens()->delete();

        // Menghapus session userName
        

        return redirect(route('auth.login'));
    }
}
