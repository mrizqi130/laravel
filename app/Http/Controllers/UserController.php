<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // echo "session kosong :" . empty(session()->get('sessionrandom'));
        // dd(session()->get('s'));
        if (!empty(session()->get('email'))) {
            // $data = User::all();
            $data = User::get();
            // $data = User::where('name', '=', '1')->get();
            $session = session();
            // sesion all mengambil semua session yg dibuat oleh user
            print_r(session()->all());
            return view('user', ['data' => $data, 'session' => $session]);
        } else {
            // echo "belum login";
            return redirect('/login')->with('msg', 'silakan login');
        }
    }

    public function loginForm()
    {
        print_r(session()->all());
        return view('login');
    }

    public function loginSubmit(Request $req)
    {
        if (Auth::attempt([
            'email' => $req->email,
            'password' => $req->password,
        ])) {
            // session_start();
            // $_SESSION['']
            $id = User::where('email', $req->email)->first('id');
            session(['id' => $id->id]);
            session(['email' => $req->email]);
            session(['password' => $req['password']]);
            return redirect('/')->with('msg', 'berhasil login');
        }
        return redirect('login')->with('msg', 'email atau password salah');
    }

    public function logout()
    {
        // session()->forget('email');
        // session()->forget('name');
        //flush menghapus semua session
        session()->flush();
        return redirect('login');
    }

    public function regisForm()
    {
        return view('regis', ['action' => 'regis-submit']);
    }

    public function regisSubmit(Request $req)
    {
        //kalau mau lihat data bisa pake print_r atau dd trus ambil request dari name yg ada di form
        // print_r($req->name);
        // print_r($req['name']);
        // dd($req['name']);

        // https://laravel.com/docs/10.x/eloquent#inserts
        User::create([
            'name' => $req['name'],
            'email' => $req['email'],
            'password' => $req['password']
        ]);
        return redirect('regis')->with('msg', 'berhasil regis');
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect('/');
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('regis', ['data' => $data, 'action' => "/user/$id/update"]);
    }
    public function update(Request $req, $id)
    {
        if (!isset($req->password)) {
            $msg = User::find($id)->email;
            User::find($id)->update(
                [
                    "name" => $req['name'],
                    "email" => $req['email'],
                ]
            );
            return redirect('/')->with('msg', "akun dengan email $msg berhasil diupdates");
        }

        $msg = User::find($id)->email;
        User::find($id)->update(
            [
                "name" => $req['name'],
                "email" => $req['email'],
                "password" => $req['password']
            ]
        );
        return redirect('/')->with('msg', "akun dengan email $msg berhasil diupdates");
    }
}
