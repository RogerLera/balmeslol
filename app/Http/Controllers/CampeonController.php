<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CampeonController extends Controller
{
	public function index(Request $request)
	{
	    return view('campeones.index');
	}
}
