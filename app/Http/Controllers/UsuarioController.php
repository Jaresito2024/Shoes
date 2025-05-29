<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('formulario.index', compact('usuarios'));

        
    }
    public function create()
    {
        return view('formulario.create');
    }
    public function edit(Usuario $usuario)
    {
        return view('formulario.edit', compact('usuario'));
    }
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:usuarios,email,' . $usuario->id,
            'telefono' => 'required|string|max:15',
            'ciudad' => 'required|string|max:255',
            'pais' => 'required|string|max:100',
            'password' => 'nullable|string|min:8|confirmed',
            'terminos' => 'accepted'
        ]);

        $datos = $request->only([
            'nombre',
            'apellido_paterno',
            'apellido_materno',
            'email',
            'telefono',
            'ciudad',
            'pais'

        ]);

        if ($request->filled('password')) {
            $datos['password'] = bcrypt($request->input('password'));
        }

        $datos['terminos'] = $request->has('terminos');
            
        

        $usuario->update($datos);

        return redirect()->route('tienda.index')->with('success', 'Usuario actualizado correctamente.');

    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);
        if(!$usuario){
            return redirect()->route('formulario.index')->with('success, ','Usuario actualizado correctamente.');

        }
        $usuario->delete();
        return redirect()->route('formulario.index')->with('success', 'Usuario eliminado correctamente.');
    }
    public function store(Request $request)
    {
        $request->validate([
        'nombre' => 'required|string|max:100',
        'apellido_paterno' => 'required|string|max:100',
        'apellido_materno' => 'required|string|max:100',
        'email' => 'required|email|max:100|unique:usuarios,email',
        'telefono' => 'required|string|max:15',
        'ciudad' => 'required|string|max:255',
        'pais' => 'required|string|max:100',
        'password' => 'required|string|min:8|confirmed',
        'terminos' => 'accepted'
        ]);
        
        try {
            Usuario::create([
                'nombre' => $request->input('nombre'),
                'apellido_paterno' => $request->input('apellido_paterno'),
                'apellido_materno' => $request->input('apellido_materno'),
                'email' => $request->input('email'),
                'telefono' => $request->input('telefono'),
                'ciudad' => $request->input('ciudad'),
                'pais' => $request->input('pais'),
                'password' => bcrypt($request->input('password')),
                'terminos' => $request->has('terminos')

            ]);

            return redirect()->route('tienda.index')->with('success', 'Usuario creado correctamente.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error al crear el usuario: ' . $e->getMessage()]);
        }
    }
    public function login()
    {
        // Aquí puedes implementar la lógica de inicio de sesión
        // Por ejemplo, validar las credenciales y redirigir al usuario a la página deseada
        return view('formulario.login');
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $usuario = Usuario::where('email', $request->input('email'))->first();

        if ($usuario && password_verify($request->input('password'), $usuario->password)) {
            // Guarda el usuario en la sesión
            session(['usuario_id' => $usuario->id]);

            return redirect()->route('tienda.index')->with('success', 'Inicio de sesión exitoso.');
        }

        return redirect()->back()->with('error', 'Credenciales incorrectas.');
    }

    public function logout()
    {
        session()->forget('usuario_id');
        return redirect()->route('formulario.login')->with('success', 'Sesión cerrada correctamente.');
    }
  
}

    



