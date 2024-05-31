<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PuntajesModel;

class PuntajesController extends Controller{
    public function guardarPuntaje(Request $request)
    {
        $respuesta = [
            "ESTATUS"=> "",
            "MENSAJE" => ""
        ];
        try {
            $data = $request->except("_token");
            $data["id_usuario"] = Auth::id();
            if(PuntajesModel::create($data))
                $respuesta["ESTATUS"] = "SUCCESS";
        } catch (\Throwable $th) {
            $respuesta["ESTATUS"] = "FAIL";
            $respuesta["MENSAJE"] = "OCURRIO UN ERROR AL GUARDAR EL PUNTAJE DEL JUGADOR";
            $respuesta["ERROR"] = $th->getMessage();
        }
        return response()->json($respuesta);
    }
}
