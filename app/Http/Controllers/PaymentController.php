<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelicula;
use App\Models\Cliente;
use App\Models\Entrada;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PaymentController extends Controller
{

    public function irPagar(string $id){
        $pelicula = Pelicula::find($id);
        return view('payments.payment',compact('pelicula'));
    }
    public function subirCliente(Request $request, $id){
        $cliente = new Cliente;
        $cliente->nombre = $request->input('nombre');
        $cliente->apellido = $request->input('apellido');
        $cliente->dni = $request->input('dni');
        $cliente->fecha_nacimiento = $request->input('fecha_nacimiento');
        $cliente->email = $request->input('email');
        $cliente->celular = $request->input('celular');
        $cliente->save();
    
        $clienteRegistrado = Cliente::find($cliente->id);

        return redirect('payments/' . $id)->with('clienteRegistrado', $clienteRegistrado);
    }
    public function subirEntrada(Request $request){

        $entrada = new Entrada();
        $entrada->n°_asiento = $request->input('n°_asiento');
        
        $entrada->horario_id = $request->input('horario_id');

        $entrada->save();

        return back();
    }
}
