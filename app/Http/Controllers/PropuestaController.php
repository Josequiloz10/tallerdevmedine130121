<?php

namespace App\Http\Controllers;

use App\Propuesta;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use NM\Daniel\PropuestaCreator;

class PropuestaController extends Controller
{
    public function save_propuesta(Request $request): JsonResponse
    {
        try{
            $propuestaCreator = new PropuestaCreator($request);
            if ($propuestaCreator->__invoke())
                $response = 'guardado';
        }catch(\InvalidArgumentException $e) {
            $response   =   $e->getMessage();
        }

        return response()->json(['mensaje' => $response]);
    }

    public function get_propuestas(Request $request): JsonResponse
    {
        $response = [
            [
                'id'=> 1,
                'nombre' => "Mark",
                'apellido' => "Otto",
                'edad' => 25,
                'saldo' => 800,
                'sexo' => "hombre",
                'cantidad_prestamo' => 20.000,
                'debe_factura' => "si"
            ],
            [
                'id'=> 2,
                'nombre' => "Jacob",
                'apellido' => "Thornton",
                'edad' => 40,
                'saldo' => 1500,
                'sexo' => "mujer",
                'cantidad_prestamo' => 50.000,
                'debe_factura' => "no"
            ],
        ];

        return response()->json($response);
    }

    public function delete_propuesta(Request $request): JsonResponse
    {
        return response()->json(['mensaje' => "delete"]);
    }

    public function update_propuesta(Request $request): JsonResponse
    {
        return response()->json(['mensaje' => "update"]);
    }
}
