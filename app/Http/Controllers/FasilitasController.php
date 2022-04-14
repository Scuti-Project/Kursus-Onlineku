<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use App\User;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('materis')->where('user_type', 'peserta')->get();
        return view('pages.fasilitas', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Fasilitas::where('user_id', $request->user_id)->delete();

        if ($request->id_materi) {
            foreach ($request->id_materi as $materi) {
                $request->merge(['id_materi' => $materi]);
                $request->validate([
                    'user_id' => 'required|string',
                    'id_materi' => 'integer'
                ]);

                Fasilitas::create($request->all());
            }
        }

        return redirect('fasilitas')->with('Data fasilitas peserta berhasil diubah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Fasilitas $fasilitas)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fasilitas $fasilitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fasilitas $fasilitas)
    {
        //
    }
}
