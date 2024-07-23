<?php

namespace App\Http\Controllers;

use App\Models\Space;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SpaceController extends Controller
{
    public function index()
    {
        $spaces = Space::all();
        return view('home', compact('spaces'));
    }

    public function show($id)
    {
        $space = Space::findOrFail($id);
        return view('spaces.space', compact('space'));
    }

    public function store(Request $request)
    {
        Log::info('Store method called');

        // Validar los datos de entrada
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Almacenar la imagen en public/images
        if ($request->hasFile('image')) {
            /* $image = Storage::disk('public')->put( '/', $request->file('image')); */
            $file = $request->file("image");
        } else {
            Log::error('File not uploaded');
            return back()->with('error', 'Image upload failed');
        }

        echo 'File Name: '.$file->getClientOriginalName();
        echo '<br>';
        echo 'File Extension: '.$file->getClientOriginalExtension();
        echo '<br>';
        echo 'File Real Path: '.$file->getRealPath();
        echo '<br>';
        echo 'File Size: '.$file->getSize();
        echo '<br>';
        echo 'File Mime Type: '.$file->getMimeType();
        echo '<br>';

        $destinationPath = "storage/images";

        if($file->move($destinationPath, $file->getClientOriginalName())) {
            echo 'File moved';
        } else {
            echo 'File not moved';
        }

        // Crear un nuevo espacio
        $space = new Space();
        $space->title = $request->input('title');
        $space->description = $request->input('description');
        $space->image = $file ?? '';
        $space->save();

        // Redireccionar con un mensaje de éxito
       
    }

    public function indexAdmin()
    {
        $spaces = Space::all();
        return view('admin.spaces', compact('spaces'));
    }

    public function createAdmin()
    {
        return view('admin.spaces.create');
    }
}
