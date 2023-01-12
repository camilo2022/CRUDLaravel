<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente; 

class ClienteController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('hola llegue');
        $clientes = Cliente::all();
        return view('clientes.index')->with('clientes',$clientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $cliente = Cliente::where('cedula','=',$request->get('cedula'))->first();
        if($cliente){
            return redirect()->back()->withErrors(['msg' => 'La cedula '.$request->get('cedula').' ya está registrada.']);
        }else{
            $datosclientes = new Cliente();
            $datosclientes->cedula = $request->get('cedula');
            $datosclientes->nombres = $request->get('nombres');
            $datosclientes->apellidos = $request->get('apellidos');
            $datosclientes->telefono = $request->get('telefono');
            $datosclientes->correo = $request->get('correo');
            $datosclientes->direccion = $request->get('direccion');
            $datosclientes->save();
            return redirect()->route('vistaC');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $cliente = Cliente::find($id);
        return view('clientes.edit')->with('clientes',$cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $clientes = Cliente::find($id);
        $clientes->nombres = $request->get('nombres');
        $clientes->apellidos = $request->get('apellidos');
        $clientes->telefono = $request->get('telefono');
        $clientes->correo = $request->get('correo');
        $clientes->direccion = $request->get('direccion');

        $clientes->save();

        return redirect()->route('vistaC');
        // $clientes = Cliente::all();
        // return view('clientes.index')->with('clientes',$clientes);
        //return view('clientes.edit')->with('clientes',$clientes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $clientes = Cliente::find($id);
        $clientes->delete();

        return redirect()->route('vistaC');
        //$clientes = Cliente::all();
        //return view('clientes.index')->with('clientes',$clientes); 
    }
}
