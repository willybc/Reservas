<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function indexAdmin() {
        return view('admin.options');
    }
}
