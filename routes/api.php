<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PersonaController;
use App\Http\Controllers\Api\EmpresaController;

Route::apiResource('personas', PersonaController::class);
Route::apiResource('empresas', EmpresaController::class);
