<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return response(Estado::get());
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
            Estado::create([
                'descripcion' => $request->descripcion
            ]);
            return response("Estado grabada con éxito.");
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
            $row = Estado::where('idEstado',$id)
                            ->update([
                                'descripcion' => $request->descripcion
                            ]);
            return response("Estado actualizado con éxito.");
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
            $row = Estado::findOrFail($id);
            $row->delete();
            return response("Estado eliminado con éxito.");
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'line' => $th->getLine()
            ]);
        }
    }
}
