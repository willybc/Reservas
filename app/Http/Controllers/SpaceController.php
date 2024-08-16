<?php

namespace App\Http\Controllers;

use App\Models\Space;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class SpaceController extends Controller
{
    public function index(Request $request) {
        $searchQuery = $request->input('search');
        $userId = $request->input('user_id');

        $spacesQuery = Space::query();

        if ($searchQuery) {
            $spacesQuery->where('title', 'like', '%' . $searchQuery . '%');
        }
    
        if ($userId) {
            $spacesQuery->whereExists(function ($query) use ($userId) {
                $query->select(DB::raw(1))
                    ->from('spaces_users')
                    ->join('users', 'users.id', '=', 'spaces_users.user_id')
                    ->whereRaw('spaces_users.space_id = spaces.id')
                    ->where('spaces_users.user_id', $userId);
            });
        }

        $spaces = $spacesQuery->get();
        $users = User::whereHas('spaces')->distinct()->get();
        $isAdmin = $request->route()->getName() === 'admin.spaces';

        if ($request->ajax()) {
            if($isAdmin) {
                return view('admin.spaces.table', compact('spaces'))->render();
            } else {
                return view('spaces.spaces', compact('spaces'))->render();
            }
        }

        return view($isAdmin ? 'admin.spaces' : 'home', compact('spaces', 'users', 'isAdmin'));
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
            $space->image = $filePath;
            $space->save();

            $space->users()->attach((auth()->id()));
    
            Log::info('Image uploaded and data saved successfully');
            return redirect()->back()->with('success', 'Image uploaded successfully!');
        } else {
            Log::error('File not uploaded');
            return back()->with('error', 'Image upload failed');
        }
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
