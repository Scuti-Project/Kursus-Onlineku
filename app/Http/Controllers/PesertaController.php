<?php

namespace App\Http\Controllers;

use App\Materi;
use App\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public static function index()
    {
    	$materis = Fasilitas::join('materi', 'materi.id_materi', '=', 'fasilitas.id_materi')->where('user_id', Auth::user()->user_id)->get();
    	return view('pages.home-peserta', compact('materis'));
    }

    public function viewMateri($id) {
    	$materi = Materi::where('id_materi', $id)->first();
    	return view('pages.materi-view', compact('materi'));
    }

    public function getVidMateri(Request $request, $id)
    {
        if ($request->header('Referer')) {
            $materi = Materi::where('id_materi', $id)->first();
            $filename = $materi->filename;

            return response()->file(storage_path('app/materi/' . $filename));
            // return response()->file('./materiStorage/' . $filename);
        } else {
            return redirect('home');
        }
    }
}
