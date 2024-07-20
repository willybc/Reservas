<?php

namespace App\Http\Controllers;

use App\Models\Space;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    public function index() {
        $spaces = Space::all();
        return view('home', compact('spaces'));
    }

    public function show($id) {
        $space = Space::findOrFail($id);
        return view('spaces.space', compact('space'));
    }
}
