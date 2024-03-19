<?php

namespace App\Http\Controllers;

use App\Mail\sendRegister;
use App\Models\User;
use Illuminate\Http\Request;
use Auth, Session, Validator, Lang;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function gate()
    {
        $check = Auth::check();
        // dd(Auth::user()->operasional_id);
        if($check)
            return redirect()->route('admin.dashboard');
        else
            return redirect()->route('login');
    }
    public function index(Request $request)
    {

       $check = Auth::check();

        if($check)
            return redirect()->route('admin.dashboard');
        else
            $judul = 'Login';
            // $datas = User::all();
            return view('pages.login.index')->with(compact('judul'));

    }
    // public function register(){
    //     $judul = 'Register';
    //     return view('register.index')->with(compact('judul'));
    // }
    // public function registerStore(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'nama' => 'required',
    //         // 'username' => 'required|unique:users,username',
    //         // 'email' => 'required|email|unique:users,email', // Menambahkan cek pengguna unik berdasarkan email
    //         'password' => 'required|min:8',
    //     ]);
    
    //     if ($validator->fails()) {
    //         $validator->errors()->add('message', $validator);
    //         return redirect()->back()->withInput()->withErrors($validator);
    //     }
    //     $check = User::where('email', $request->email)->first();
    //     if($check){
    //         return redirect()->back()->withInput()->withErrors('Email atau Username sudah Ada');
    //     }else{
    //         // Membuat pengguna baru
    //         $user = new User;
    //         $user->name = $request->nama;
    //         $user->username = $request->username;
    //         $user->email = $request->email;
    //         $user->password = bcrypt($request->password);
    //         $user->save();
    //     // dd($user);
    //     // dd(Mail::to($user->email)->send(new sendRegister()));
    //         // Mengirim email
    //         // Mail::to($user->email)->send(new sendRegister());
    
    //         Session::flash('message', Lang::get('Registrasi Berhasil'));
    //         return redirect()->route('login');
    //     }
        
    // }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            // Authenticated successfully
    
            // Periksa peran pengguna
            if (Auth::user()->role == 'admin') {
                // Jika pengguna adalah admin, alihkan ke halaman dashboard admin
                return redirect()->intended('admin/dashboard');
            } else {
                // Jika pengguna bukan admin, alihkan ke halaman lain (misalnya halaman beranda)
                return redirect()->intended('/');
            }
        } else {
            // Failed authentication
            return redirect()->back()->withInput()->withErrors(['message' => 'Email atau Password Salah']);
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }
    public function logoutUser()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('home.index');
    }
   
    
    
}
