<?php

namespace App\Http\Controllers;

use App\Http\Resources\MaterijalResurs;
use App\Models\Materijal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaterijalController extends BaseController
{
    public function index()
    {
        $materijali = Materijal::all();
        return $this->uspesno(MaterijalResurs::collection($materijali), 'Vraceni su svi materijali.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'materijal' => 'required'
        ]);
        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $materijal = Materijal::create($input);

        return $this->uspesno(new MaterijalResurs($materijal), 'Novi materijal je kreiran.');
    }


    public function show($id)
    {
        $materijal = Materijal::find($id);
        if (is_null($materijal)) {
            return $this->greska('Materijal sa zadatim ID-em ne postoji.');
        }
        return $this->uspesno(new MaterijalResurs($materijal), 'Materijal sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $materijal = Materijal::find($id);
        if (is_null($materijal)) {
            return $this->greska('Materijal sa zadatim ID-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'materijal' => 'required'
        ]);

        if($validator->fails()){
            return $this->greska($validator->errors());
        }

        $materijal->materijal = $input['materijal'];
        $materijal->save();

        return $this->uspesno(new MaterijalResurs($materijal), 'Materijal je azuriran.');
    }

    public function destroy($id)
    {
        $materijal = Materijal::find($id);
        if (is_null($materijal)) {
            return $this->greska('Materijal sa zadatim ID-em ne postoji.');
        }
        $materijal->delete();
        return $this->uspesno([], 'Materijal je obrisan.');
    }
}
