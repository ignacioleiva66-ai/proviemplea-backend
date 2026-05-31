<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PerfilController extends Controller
{
    public function index()
    {
        $perfiles = Cache::remember('perfiles_all', 300, function () {
            return Perfil::where('visible', true)->get();
        });

        return response()->json($perfiles, 200)
            ->header('Cache-Control', 'public, max-age=300')
            ->header('X-RateLimit-Limit', '100')
            ->header('X-RateLimit-Remaining', '95');
    }

    public function show($id)
    {
        $perfil = Cache::remember("perfil_{$id}", 300, function () use ($id) {
            return Perfil::findOrFail($id);
        });
        return response()->json($perfil);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'experiencia_laboral' => 'required|array',
            'habilidades' => 'required|array',
            'certificaciones' => 'nullable|array',
            'anos_experiencia' => 'integer|min:0',
        ]);

        $perfil = Perfil::create($validated);
        Cache::forget('perfiles_all');

        return response()->json([
            'message' => 'Perfil creado exitosamente - CV Ciego Activado',
            'data' => $perfil
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $perfil = Perfil::findOrFail($id);
        $validated = $request->validate([
            'experiencia_laboral' => 'array',
            'habilidades' => 'array',
            'certificaciones' => 'nullable|array',
            'anos_experiencia' => 'integer|min:0',
            'visible' => 'boolean'
        ]);

        $perfil->update($validated);
        Cache::forget(['perfiles_all', "perfil_{$id}"]);

        return response()->json($perfil);
    }

    public function destroy($id)
    {
        $perfil = Perfil::findOrFail($id);
        $perfil->delete();
        Cache::forget(['perfiles_all', "perfil_{$id}"]);

        return response()->json(['message' => 'Perfil eliminado'], 204);
    }
}
