<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Zapato;

class CarritoController extends Controller
{
    public function mostrar()
    {
       // Verificar si el usuario está autenticado (vía sesión manual)
        if (!session()->has('usuario_id')) {
            return redirect()->route('formulario.login')->with('error', 'Debes iniciar sesión para ver el carrito.');
        }

        // Obtener el ID del usuario autenticado
        $usuarioId = session('usuario_id');

        // Obtener el carrito de la sesión del usuario
        $carrito = session('carrito_' . $usuarioId, []);

        return view('tienda.carrito', compact('carrito'));
    }
    public function comprarCarrito(Request $request)
        {
            $usuarioId = session('usuario_id');

                if (!$usuarioId) {
                    return redirect()->route('formulario.login')->with('error', 'Debes iniciar sesión para realizar la compra.');
                }

            $carrito = session()->get('carrito_' . $usuarioId, []);

            if (empty($carrito)) {
                return redirect()->back()->with('error', 'Tu carrito está vacío.');
            }

            try {
                foreach ($carrito as $item) {
                    $zapato = Zapato::findOrFail($item['id']);

                // Verificar disponibilidad
                    if ($zapato->cantidad < $item['cantidad']) {
                        return redirect()->back()->with('error', "No hay suficiente stock del zapato: {$zapato->nombre}");
                    }

                // Registrar compra por unidad
                for($i = 0; $i < $item['cantidad']; $i++) {
                    // Crear una nueva compra
                    Compra::create([
                       'usuario_id' => $usuarioId,
                       'zapato_id' => $zapato->id,
                       'precio' => $zapato->precio,
                       'created_at' => now(),
                       'updated_at' => now(),
                    ]);
                }

                // Actualizar inventario
                $zapato->cantidad -= $item['cantidad'];
                $zapato->save();
                }

                // Vaciar el carrito
                session()->forget('carrito_' . $usuarioId);

                return redirect()->route('perfil.compras')->with('success', 'Compra realizada con éxito.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error al realizar la compra. Inténtalo de nuevo.');
            }
        }
               public function compras()
    {
        $usuarioId = session('usuario_id');
        if (!$usuarioId) {
            return redirect()->route('formulario.login')->with('error', 'Debes iniciar sesión para ver tus compras.');
        }
        // Obtener las compras del usuario agrupadas por zapato
        $compras = Compra::selectRaw('zapato_id, COUNT(*) as cantidad_total')
            ->where('usuario_id', $usuarioId)
            ->groupBy('zapato_id')
            ->with('zapato') // Asegúrate de que la relación esté definida en el modelo Compra
            ->get();
        return view('perfil.compras', compact('compras'));
    }
        public function vaciar()
        {
            $usuarioId = session('usuario_id');
            if (!$usuarioId) {
                return redirect()->route('formulario.login')->with('error', 'Debes iniciar sesión para vaciar el carrito.');
            }

            session()->forget('carrito_' . $usuarioId);

            return redirect()->route('tienda.index')->with('success', 'Carrito vaciado con éxito.');
        }
        public function eliminar($id)
        {
            $usuarioId = session('usuario_id');
            $carrito = session()->get('carrito_' . $usuarioId, []);

        // Filtrar el producto a eliminar
            $carrito = array_filter($carrito, function ($item) use ($id) {
                return $item['id'] != $id;
            });

            session(['carrito_' . $usuarioId => $carrito]);

            return redirect()->back()->with('success', 'Producto eliminado del carrito.');
        }

   
}