<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(){
        return view('admin');
    }
    public function edit(Request $req, Admin $admin)
    {
        return \view('Password.edit',\compact('admin'));
    }
    public function update(Request $req, Admin $admin)
    {
        // $this->validate($req,[
        //     'name'=>'required',
        //     'email'=>'required',
        //     'password'=>'required',
        // ]);
        // $encrypt = Crypt::encryptString($req->password);
        // try {
        //     $decrypted = Crypt::decryptString($encrypt);
        //     \dd($decrypted,$encrypt);
        // } catch (DecryptException $e) {
        //     \dd('entah');
        // }

        // $cryp = Crypt::encryptString($req->password);
        // $bcryp = Crypt::decryptString($cryp);
        // \dd($cryp,$bcryp,);
        // \dd($req->all());
        $admin->name = $req->name;
        $admin->email = $req->email;
        $admin->password = Hash::make($req->password);
        $admin->save();
        Session::flush();
        Auth::logout();
        return \redirect()->route('login.index')->with(['msg'=>'Silahkan login kembali menggunakan username dan password baru!!']);
    }
}
