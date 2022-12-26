<?php

namespace App\Http\Controllers;

use App\Http\Resources\NakitResurs;
use App\Models\Nakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NakitController extends BaseController
{
    public function index()
    {
        $nakit = Nakit::all();
        return $this->uspesno(NakitResurs::collection($nakit), 'Vracen je sav nakit.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'vrstaID' => 'required',
            'naziv' => 'required',
            'materijalID' => 'required',
            'cena' => 'required'
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $nakit = Nakit::create($input);

        return $this->uspesno(new NakitResurs($nakit), 'Novi nakit je kreiran.');
    }


    public function show($id)
    {
        $nakit = Nakit::find($id);
        if (is_null($nakit)) {
            return $this->greska('Nakit sa zadatim ID-em ne postoji.');
        }
        return $this->uspesno(new NakitResurs($nakit), 'Nakit sa zadatim ID-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $nakit = Nakit::find($id);
        if (is_null($nakit)) {
            return $this->greska('Nakit sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'vrstaID' => 'required',
            'naziv' => 'required',
            'materijalID' => 'required',
            'cena' => 'required'
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $nakit->vrstaID = $input['vrstaID'];
        $nakit->naziv = $input['naziv'];
        $nakit->materijalID = $input['materijalID'];
        $nakit->cena = $input['cena'];
        $nakit->save();

        return $this->uspesno(new NakitResurs($nakit), 'Nakit je azuriran.');
    }

    public function destroy($id)
    {
        $nakit = Nakit::find($id);
        if (is_null($nakit)) {
            return $this->greska('Nakit sa zadatim ID-em ne postoji.');
        }

        $nakit->delete();
        return $this->uspesno([], 'Nakit je obrisan.');
    }
}
