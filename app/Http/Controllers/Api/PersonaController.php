<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PersonaController extends Controller {
    public function index() {
        $data = Cache::remember('personas', 300, fn() => Persona::where('visible', true)->get());
        return response()->json($data);
    }

    public function show($id) {
        $data = Cache::remember("persona_{$id}", 300, fn() => Persona::findOrFail($id));
        return response()->json($data);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'experiencia_laboral' => 'required|array',
            'habilidades' => 'required|array',
            'certificaciones' => 'nullable|array',
            'anos_experiencia' => 'integer|min:0',
        ]);
        $persona = Persona::create($validated);
        Cache::forget('personas');
        return response()->json($persona, 201);
    }

    public function update(Request $request, $id) {
        $persona = Persona::findOrFail($id);
        $persona->update($request->all());
        Cache::forget(['personas', "persona_{$id}"]);
        return response()->json($persona);
    }

    public function destroy($id) {
        $persona = Persona::findOrFail($id);
        $persona->delete();
        Cache::forget(['personas', "persona_{$id}"]);
        return response()->json(null, 204);
    }
}
