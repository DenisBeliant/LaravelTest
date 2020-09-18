<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function create() {
        return view('infos');
    }

    public function store(Request $r) {
        return "Votre nom est : ".$r->input('nom');
    }
}
