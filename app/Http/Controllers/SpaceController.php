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
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('images', $fileName, 'public');
    
            // Guardar la ruta en la base de datos
            $space = new Space();
            $space->title = $request->input('title');
            $space->description = $request->input('description');
            $space->image = $filePath; // Guardar la ruta relativa en lugar de la ruta temporal
            $space->save();
    
            Log::info('Image uploaded and data saved successfully');
            return redirect()->back()->with('success', 'Image uploaded successfully!');
        } else {
            Log::error('File not uploaded');
            return back()->with('error', 'Image upload failed');
        }
    }

    public function indexAdmin()
    {
        $spaces = Space::all();
        return view('admin.spaces', compact('spaces'));
    }

    public function createAdmin()
    {
        return view('admin.spaces.form');
    }

    public function editAdmin($idSpace) {
        $space = Space::findOrFail($idSpace);
        return view('admin.spaces.form', compact('space'));
    }

    public function update(Request $request, $idSpace) {
        $request -> validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $space = Space::findOrFail($idSpace);
        $space->title = $request->input('title');
        $space->description = $request->input('description');

        if($request -> hasFile('image')) {
            $file = $request-> file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('images', $fileName, 'public');
            $space-> image = $filePath;
        }

        $space->save();
        return redirect()->route('admin.spaces')->with('success', 'Space updated successfully');
    }

    public function destroy($idSpace) {
        $space = Space::findOrFail($idSpace);
        $space->delete();
        return redirect()->route('admin.spaces')->with('success', 'Space deleted successfully');
    }


}
