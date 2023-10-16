<?php

namespace App\Http\Controllers;

use App\Models\tipoProducto;
use Illuminate\Http\Request;

class tipoProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return response(tipoProducto::get());
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
            tipoProducto::create([
                'descripcion' => $request->descripcion,
                'estado' => $request->estado
            ]);
            return response("Tipo de producto grabado con éxito.");
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
            $row = tipoProducto::where('idTipoProducto',$id)
                            ->update([
                                "descripcion" => $request->descripcion,
                                "estado" => $request->estado
                            ]);
            return response("Tipo de producto actualizado con éxito.");
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
            $row = tipoProducto::findOrFail($id);
            $row->delete();
            return response("Tipo de producto eliminado con éxito.");
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'line' => $th->getLine()
            ]);
        }
    }
}
