<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;

class BaseController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function uspesno($podaci, $poruka)
    {
        $odgovor = [
            'uspesno' => true,
            'podaci'    => $podaci,
            'poruka' => $poruka,
        ];

        return response()->json($odgovor, 200);
    }


    /**
     * @return \Illuminate\Http\Response
     */
    public function greska($greska, $nizGresaka = [], $code = 404)
    {
        $odgovor = [
            'uspesno' => false,
            'poruka' => $greska,
        ];

        if(!empty($nizGresaka)){
            $odgovor['podaci'] = $nizGresaka;
        }

        return response()->json($odgovor, $code);
    }
}
