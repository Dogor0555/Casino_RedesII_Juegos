<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PuntajesModel extends Model
{
    protected $table = "putajesUsuarios";
    protected $id = "id_puntaje_usuario";
    protected $fillable = [
        'id_puntaje_usuario',
        'id_usuario',
        'puntos_jugador',
        'puntos_crupier',
        'puntos_ganados'
    ];
    public $timestamps = false;
    public function usuario()
    {
        return $this->belongsTo("App\Models\User", "id_usuario");
    }
}
