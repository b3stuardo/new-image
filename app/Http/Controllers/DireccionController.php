<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return response(Direccion::get());
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
            Direccion::create([
                'zona' => $request->zona,
                'departamento' => $request->departamento
            ]);
            return response("Direccion grabada con éxito.");
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
            $row = Direccion::where('idDireccion',$id)
                            ->update([
                                'zona' => $request->zona,
                                'departamento' => $request->departamento
                            ]);
            return response("Direccion actualizada con éxito.");
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
            $row = Direccion::findOrFail($id);
            $row->delete();
            return response("Direccion eliminada con éxito.");
        } catch (\Throwable $th) {
            return response()->json([
                'error' => $th->getMessage(),
                'line' => $th->getLine()
            ]);
        }
    }
}
