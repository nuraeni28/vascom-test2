<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator, Session, Lang;

class AdminController extends Controller
{
    
    public function index()
    {
        $judul = 'Dashboard';
        $pd = Produk::all()->count();
        $pdAk = Produk::where('status','aktif')->count();
        $usersAk = User::where('status','aktif')->count();
        $users = User::all()->count();
        $p = Produk::latest()->take(10)->get();

        return view('pages.dashboard.index')->with(compact('judul', 'pd', 'users', 'pdAk','usersAk', 'p'));
    }
    public function User()
    {
        $judul = 'Manajemen User';
        $datas = User::all();
        return view('pages.user.index')->with(compact('judul','datas'));
    }
    public function createUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
        ]);
    
        if ($validator->fails()) {
            $validator->errors()->add('message', $validator);
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $check = User::where('email', $request->email)->first();
        if($check){
            return redirect()->back()->withInput()->withErrors(['message'=>'Informasi Kegiatan sudah Ada']);
        }else{
            if ($request->hasFile('foto')) {
                // File uploaded, proceed with processing
                $file = $request->file('foto');
                $no = User::all()->count();
                // dd($file);
                $tujuan_upload = 'Foto';
                $file->move($tujuan_upload,'Foto-user-'.sprintf($no+1).'.'.$file->getClientOriginalExtension());
                // Membuat pengguna baru
                $users = new User();
                $users->name = $request->nama;
                $users->email = $request->email;
                $users->no_hp = $request->no_telp;
                $users->status = 'Tidak Aktif';
                $users->password = bcrypt('12345678');
                $users->role ='user' ;
                $users->foto = 'Foto-User-'.sprintf($no+1).'.'.$file->getClientOriginalExtension();
                $users->save();
            } else {
                return redirect()->back()->withInput()->withErrors(['message'=>'Foto Tidak Terbaca']);
            }
           
        // dd($user);
        // dd(Mail::to($user->email)->send(new sendRegister()));
            // Mengirim email
    
            Session::flash('message', Lang::get('Data Berhasil Masuk'));
            return redirect()->route('admin.user');
        }
        
    }
    public function verifyUser($id)
    {
        $user = User::findOrFail($id);

        // Periksa apakah pengguna sudah aktif
        if ($user->status != 'Aktif') {
            $user->status = 'Aktif';
            $user->save();
        }

        return redirect()->route('admin.user')->with('success', 'Pengguna berhasil diverifikasi.');
    }

    public function deleteUser($id) {
        $image = User::find($id);
        if (File::exists('http://127.0.0.1:8000/Foto/'.$image->foto)) {
            File::delete('http://127.0.0.1:8000/Foto/'.$image->foto);
        }

        User::find($id)->delete();
      
        return redirect()->route('admin.user');
    }
    public function editUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
        ]);
    
        if ($validator->fails()) {
            $validator->errors()->add('message', $validator);
            return redirect()->back()->withInput()->withErrors($validator);
        }
       
            if ($request->hasFile('foto')) {
                // File uploaded, proceed with processing
                $file = $request->file('foto');
                // $no = Informasi::all()->count();
                // dd($file);
                $tujuan_upload = 'Foto';
                $file->move($tujuan_upload,'Foto-user-'.sprintf($id).'.'.$file->getClientOriginalExtension());
                // Membuat pengguna baru
                $users = User::where('id',$id)->first();
                $users->name = $request->nama;
                $users->email = $request->email;
                $users->no_hp = $request->no_telp;
                $users->foto = 'Foto-user-'.sprintf($id).'.'.$file->getClientOriginalExtension();
                $users->save();
            } else {
                $users = User::where('id',$id)->first();
                $users->name = $request->nama;
                $users->email = $request->email;
                $users->no_hp = $request->no_telp;
                $users->save();
            }
           
        // dd($user);
        // dd(Mail::to($user->email)->send(new sendRegister()));
            // Mengirim email
    
            Session::flash('message', Lang::get('Data Berhasil Diedit'));
            return redirect()->route('admin.user');
        }
     
        public function Produk()
        {
            $judul = 'Manajemen Produk';
            $datas = Produk::all();
            return view('pages.produk.index')->with(compact('judul','datas'));
        }
        public function createProduk(Request $request)
        {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'harga' => 'required',
              
            ]);
        
            if ($validator->fails()) {
                $validator->errors()->add('message', $validator);
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $check = Produk::where('nama', $request->nama)->first();
            if($check){
                return redirect()->back()->withInput()->withErrors(['message'=>'Informasi Kegiatan sudah Ada']);
            }else{
                if ($request->hasFile('foto')) {
                    // File uploaded, proceed with processing
                    $file = $request->file('foto');
                    $no = Produk::all()->count();
                    // dd($file);
                    $tujuan_upload = 'Foto';
                    $file->move($tujuan_upload,'Foto-produk-'.sprintf($no+1).'.'.$file->getClientOriginalExtension());
                    // Membuat pengguna baru
                    $produk = new Produk();
                    $produk->nama = $request->nama;
                    $produk->harga = $request->harga;
                    $produk->status = 'Tidak Aktif';
                    $produk->foto = 'Foto-produk-'.sprintf($no+1).'.'.$file->getClientOriginalExtension();
                    $produk->save();
                } else {
                    return redirect()->back()->withInput()->withErrors(['message'=>'Foto Tidak Terbaca']);
                }
               
            // dd($user);
            // dd(Mail::to($user->email)->send(new sendRegister()));
                // Mengirim email
        
                Session::flash('message', Lang::get('Data Berhasil Masuk'));
                return redirect()->route('admin.produk');
            }
            
        }
        public function editProduk(Request $request, $id)
        {
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'harga' => 'required',
            ]);
        
            if ($validator->fails()) {
                $validator->errors()->add('message', $validator);
                return redirect()->back()->withInput()->withErrors($validator);
            }
           
                if ($request->hasFile('foto')) {
                    // File uploaded, proceed with processing
                    $file = $request->file('foto');
                    // $no = Informasi::all()->count();
                    // dd($file);
                    $tujuan_upload = 'Foto';
                    $file->move($tujuan_upload,'Foto-produk-'.sprintf($id).'.'.$file->getClientOriginalExtension());
                    // Membuat pengguna baru
                    $produk = Produk::where('id',$id)->first();
                    $produk->nama = $request->nama;
                    $produk->harga = $request->harga;
                    $produk->foto = 'Foto-produk-'.sprintf($id).'.'.$file->getClientOriginalExtension();
                    $produk->save();
                } else {
                    $produk = Produk::where('id',$id)->first();
                    $produk->nama = $request->nama;
                    $produk->harga = $request->harga;
                    $produk->save();
                }
               
            // dd($user);
            // dd(Mail::to($user->email)->send(new sendRegister()));
                // Mengirim email
        
                Session::flash('message', Lang::get('Data Berhasil Diedit'));
                return redirect()->route('admin.produk');
            }
            public function deleteProduk($id) {
                $image = Produk::find($id);
                if (File::exists('http://127.0.0.1:8000/Foto/'.$image->foto)) {
                    File::delete('http://127.0.0.1:8000/Foto/'.$image->foto);
                }
        
                Produk::find($id)->delete();
              
                return redirect()->route('admin.produk');
            }
            public function verifyProduk($id)
            {
                $produk = Produk::findOrFail($id);
        
                // Periksa apakah pengguna sudah aktif
                if ($produk->status != 'Aktif') {
                    $produk->status = 'Aktif';
                    $produk->save();
                }
        
                return redirect()->route('admin.produk')->with('success', 'Pengguna berhasil diverifikasi.');
            }

}
