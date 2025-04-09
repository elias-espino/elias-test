<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PictureController extends Controller
{
    // Aplicar middleware a todas las acciones
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Mostrar la vista de imágenes (con carrusel)
    public function index()
    {
        $pictures = auth()->user()->pictures ?? collect();
        return view('pictures.index', compact('pictures'));
    }

    // Subir una nueva imagen
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Guardar imagen en el almacenamiento público
        $path = $request->file('image')->store('pictures', 'public');

        // Crear el registro en la base de datos
        Picture::create([
            'name' => $request->name,
            'description' => $request->description,
            'mime' => $request->file('image')->getClientMimeType(),
            'path' => $path,
            'user_id' => auth()->id(), // Asociar la imagen al usuario autenticado
        ]);

        return back()->with('success', 'Image uploaded successfully.');
    }

    // Eliminar una imagen
    public function destroy($id)
    {
        $picture = Picture::findOrFail($id);
        Storage::delete('public/' . $picture->path); // Eliminar el archivo del almacenamiento
        $picture->delete(); // Eliminar el registro de la base de datos

        return back()->with('success', 'Image deleted successfully.');
    }
}
