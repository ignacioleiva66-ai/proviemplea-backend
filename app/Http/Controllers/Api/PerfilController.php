<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    // Método GET: Leer perfiles (Caché y Rate Limit implementados)
    public function index()
    {
        $perfiles = [
            [
                "id" => 101,
                "experiencia_laboral" => [["puesto" => "Production Operator", "anos" => 7]],
                "habilidades" => ["Java", "Docker", "Laravel"],
                "visible" => true
            ]
        ];

        return response()->json($perfiles, 200)
            ->header('Cache-Control', 'public, max-age=300')
            ->header('X-RateLimit-Limit', '60');
    }

    // Método POST: Crear un nuevo perfil
    public function store(Request $request)
    {
        // Validación básica de Laravel
        $request->validate([
            'experiencia_laboral' => 'required|array',
            'habilidades' => 'required|array'
        ]);

        return response()->json([
            "message" => "Perfil creado con éxito bajo formato CV Ciego",
            "data" => $request->all()
        ], 201);
    }
}
