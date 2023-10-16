<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return response(Producto::with('tipoProducto')->get());
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'line' => $th->getLine()
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Producto::create([
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'codigo' => $request->codigo,
                'precio' => $request->precio,
                'cantidad' => $request->cantidad,
                'idTipoProducto' => $request->idTipoProducto
            ]);
            return response("Producto grabado con éxito.");
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'line' => $th->getLine()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $row = Producto::where('idProducto',$id)
                            ->update([
                                'nombre' => $request->nombre,
                                'descripcion' => $request->descripcion,
                                'codigo' => $request->codigo,
                                'precio' => $request->precio,
                                'cantidad' => $request->cantidad,
                                'idTipoProducto' => $request->idTipoProducto
                            ]);
            return response("Producto actualizado con éxito.");
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'line' => $th->getLine()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $row = Producto::findOrFail($id);
            $row->delete();
            return response("Producto eliminado con éxito.");
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'line' => $th->getLine()
            ]);
        }
    }
}