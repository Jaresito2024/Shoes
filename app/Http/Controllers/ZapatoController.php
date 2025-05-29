<?php

namespace App\Http\Controllers;

use App\Models\Zapato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ZapatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zapatos = Zapato::all();
        return view('zapatos.index', compact('zapatos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('zapatos.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    // Validar los datos
    $request->validate([
        'nombre' => 'required|string|max:100',
        'descripcion' => 'required|string',
        'talla' => 'required|string|max:10',
        'color' => 'required|string|max:50',
        'precio' => 'required|numeric',
        'cantidad' => 'required|integer',
        'imagen' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',  // Validación de la imagen
        'categoria' => 'required|string|max:50',
    ]);

    // Subir la imagen
    $imagen = $request->file('imagen');
    $imagenPath = $imagen->store('imagenes', 'public'); // Guarda la imagen en la carpeta 'storage/app/public/imagenes'

    // Crear el zapato
    try {
        Zapato::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'talla' => $request->talla,
            'color' => $request->color,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'imagen' => $imagenPath, // Guardamos la ruta de la imagen
            'categoria' => $request->categoria,
            'destacado' => $request->has('destacado'), // Guardamos el estado de destacado
        ]);

        return redirect()->route('zapatos.create')->with('success', 'Zapato agregado exitosamente.');
    } catch (\Exception $e) {
        return redirect()->route('zapatos.create')->with('error', 'Hubo un error al guardar el zapato.');
    }
}



    /**
     * Display the specified resource.
     */
    public function show(Zapato $zapato)
    {
        return view('zapatos.show', compact('zapato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Zapato $zapato)
    {
        return view('zapatos.edit', compact('zapato'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Zapato $zapato)
    {
    // Validar los datos recibidos
    $request->validate([
        'nombre' => 'required|string|max:100',
        'descripcion' => 'required|string',
        'talla' => 'required|string|max:10',
        'color' => 'required|string|max:50',
        'precio' => 'required|numeric',
        'cantidad' => 'required|integer',
        'imagen' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        'categoria' => 'required|string|max:50',
    ]);

    if ($request->hasFile('imagen')) {
    // Borra la imagen anterior si existe
    if ($zapato->imagen) {
        Storage::delete('public/' . $zapato->imagen);
    }

    $imagen = $request->file('imagen')->store('imagenes', 'public');
    } else {
    $imagen = $zapato->imagen;
    }


    // Actualizar los datos del zapato
    $zapato->update([
        'nombre' => $request->nombre,
        'descripcion' => $request->descripcion,
        'talla' => $request->talla,
        'color' => $request->color,
        'precio' => $request->precio,
        'cantidad' => $request->cantidad,
        'imagen' => $request->imagen ? $request->file('imagen')->store('imagenes', 'public') : $zapato->imagen,
        'categoria' => $request->categoria,
        'destacado' => $request->has('destacado'), // Guardamos el estado de destacado
    ]);

    // Redirigir a la lista de zapatos con mensaje de éxito
    return redirect()->route('zapatos.index')->with('success', 'Zapato actualizado exitosamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zapato $zapato)
    {
    //Elimnamos la imagen de la carpeta storage
    if (Storage::exists('public/'. $zapato->imagen)) {
        Storage::delete('public/' . $zapato->imagen);
    }
    // Eliminar el zapato
    $zapato->delete();

    // Redirigir con mensaje de éxito
    return redirect()->route('zapatos.index')->with('success', 'Zapato eliminado exitosamente.');
    }

}
