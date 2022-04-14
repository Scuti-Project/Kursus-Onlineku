<?php

namespace App\Http\Controllers;

use App\User;
use App\Materi;
use App\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_is_admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('pages.user', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'password' => 'required',
            'nama' => 'required',
            'alamat' => '',
            'kota' => 'required',
            'user_type' => 'required',
        ]);
        $request->merge(['password' => Hash::make($request->input('password'))]);     // Modify password value, hash
        $request->merge(['user_type' => $request->input('user_type', 'peserta')]);
        User::create($request->all());

        return redirect('user')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.user-edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit_fasilitas(User $user)
    {
        $full_materis = Materi::all();
        $unselected_materis = Materi::whereNotIn('id_materi', function($query) use ($user) {
            $query->select('id_materi')->from('fasilitas')->where('user_id', $user->user_id)->get();
        })->get();
        $fasilitas = Fasilitas::join('materi', 'materi.id_materi', '=', 'fasilitas.id_materi')->where('user_id', $user->user_id)->get();
        // $fasilitas = $fasilitas->toArray();
        // print_r($materis[0]['judul_materi']);
        return view('pages.user-edit-fasilitas', compact('user', 'full_materis', 'unselected_materis', 'fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_id' => 'required',
            'nama' => 'required',
            'alamat' => '',
            'kota' => 'required',
            'user_type' => 'required',
        ]);

        $request->merge(['user_type' => $request->input('user_type')]);
        if (!$request->filled('password')) {
            $data = $request->except('password');
        } else {
            $request->merge(['password' => Hash::make($request->input('password'))]);     // Modify password value, hash
            $data = $request->all();
        }
        $user->update($data);

        return redirect('user')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->user_type == 'peserta') {
            $user->delete();

            return redirect('user')->with('success', 'Data berhasil dihapus.');
        } else {
            return redirect('user')->with('failed', 'Admin tidak dapat dihapus.');
        }

    }
}
