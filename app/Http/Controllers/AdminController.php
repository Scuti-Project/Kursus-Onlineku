<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth_is_admin');
	}

    public static function index()
    {
    	return view('pages.home');
    }
}
