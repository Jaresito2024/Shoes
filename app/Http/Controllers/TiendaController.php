<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Zapato;
use App\Models\Compra;

class TiendaController extends Controller
    {

        public function index(Request $request)
        {
            $query = Zapato::query();

            if ($request->has('search') && !empty($request->search)) {
                  $query->where('nombre', 'like', '%' . $request->search . '%')
                        ->orWhere('categoria', 'like', '%' . $request->search . '%');
                 // Puedes agregar más campos como categoría si lo deseas
               }
            $zapatos = Zapato::all();

            return view('tienda.index', compact('zapatos'));
        }
        public function mostrar($hombre)
        {
            $productos = Zapato::where('categoria', $hombre)->get();
            return view('categoria', compact('productos', 'hombre'));
        }
        public function preview($id)
        {
            $zapato = Zapato::findOrFail($id);
            return view('tienda.preview', compact('zapato'));
        }
        



        public function perfil()
        {
                $usuarioId = auth()->id();
                    $compras = Compra::with('zapato')
                            ->where('usuario_id', $usuarioId)
                            ->latest()
                            ->get();
                        
            return view('perfil.compras', compact('compras'));
        }

        public function agregarAlCarrito(Request $request, $id)
        {
            $usuarioId = session('usuario_id'); 
            if (!$usuarioId) {
                return redirect()->route('formulario.login')->with('error', 'Debes iniciar sesión para agregar productos al carrito.');
            }
            $zapato = Zapato::findOrFail($id);

            $carrito = session()->get('carrito_'. $usuarioId, []);

            if (isset($carrito[$id])) {
                $carrito[$id]['cantidad']++;
            } else {
                $carrito[$id] = [
                   'id' => $zapato->id,
                   'nombre' => $zapato->nombre,
                   'precio' => $zapato->precio,
                   'cantidad' => 1
                ];
            }

            session()->put('carrito_'. $usuarioId, $carrito);

            return redirect()->route('tienda.index')->with('success', 'Producto agregado al carrito.');
        }
        public function verCarrito()
        {
            $carrito = session()->get('carrito', []);
            return view('tienda.carrito', compact('carrito'));
        }

        public function eliminarDelCarrito($id)
        {
            $carrito = session()->get('carrito', []);

            if (isset($carrito[$id])) {
                unset($carrito[$id]);
                session()->put('carrito', $carrito);
            }

            return redirect()->route('tienda.carrito')->with('success', 'Producto eliminado del carrito.');
        }
        public function categorias()
        {
            //Obtener todas las categorias distintas
            $categorias = Zapato::select('categoria')->distinct()->pluck('categoria');
            $zapatosPorCategoria = [];
            foreach ($categorias as $categoria) {
                $zapatosPorCategoria[$categoria] = Zapato::where('categoria', $categoria)->get();
            }
            return view('tienda.categorias', compact('zapatosPorCategoria'));
        }
        public function masVendidos()
        {
        $zapatos = Zapato::withCount('compras')
            ->orderBy('compras_count', 'desc')
            ->take(12)
            ->get();


        return view('tienda.bestsellers', compact('zapatos'));
        }
        public function buscarZapatos(Request $request)
        {
            $termino = $request->q;

            $zapatos = Zapato::where('nombre', 'LIKE', "%{$termino}%")
                ->select('id', 'nombre') // Solo los campos necesarios
                ->limit(5)
                ->get();

            return response()->json($zapatos);
}



    



    
}
 
    

