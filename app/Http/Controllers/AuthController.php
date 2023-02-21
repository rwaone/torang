<?php

namespace App\Http\Controllers;

use App\Models\Timkerja;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        $tahun = date('Y');
        $daftar_tahun = [$tahun, $tahun - 1, $tahun - 2];
        return view('pages.login', [
            "title" => "Login",
            "menu" => "Login",
            "daftar_tahun" => $daftar_tahun,
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

       
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if((Timkerja::firstWhere('ketua_id', auth()->user()->pegawai_id))){
                $ketua_tim = 1;
            }else{
                $ketua_tim = 0;
            }
            session([
                'tahun' => $request['tahun'],
                'ketua_tim' => $ketua_tim,
            ]);

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
