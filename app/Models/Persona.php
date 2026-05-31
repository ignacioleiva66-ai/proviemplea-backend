<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model {
    protected $fillable = ['experiencia_laboral', 'habilidades', 'certificaciones', 'anos_experiencia', 'visible'];
    protected $casts = [
        'experiencia_laboral' => 'array',
        'habilidades' => 'array',
        'certificaciones' => 'array',
        'visible' => 'boolean'
    ];
}
