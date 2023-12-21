<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rapot;
use App\Models\User;

class rapotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('rapot.rapot-table', ['data' => rapot::get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        return view(
            'rapot.rapot-form',
            [
                'action' => 'submit-rapot'
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        rapot::create([
            'mk' => $request['mk'],
            'nilai' => $request['nilai'],
            'fk_user' => $request['fk_user'],
        ]);
        return redirect('rapot')->with('msg', 'berhasil data ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $fk_user)
    {
        // mengambil kolom secara spesifik
        // return view('rapot.rapot-table', ['data' => rapot::get('nilai')]);
        $dataRapot = rapot::where('fk_user', $fk_user)->get();
        $dataUser = User::where('id', $fk_user)->first();
        return view('rapot.rapot-table', [
            'data' => $dataRapot,
            'name' => $dataUser->name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = rapot::find($id);
        return view('rapot.rapot-form', ['data' => $data, 'action' => "/rapot/$id/update"]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $msg = rapot::find($id)->email;
        rapot::find($id)->update(
            [
                "mk" => $request['mk'],
                "nilai" => $request['nilai'],
            ]
        );
        return redirect('rapot');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        rapot::destroy($id);
        return redirect('rapot');
    }
}
