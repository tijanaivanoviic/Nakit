<?php

namespace App\Http\Resources;

use App\Models\Vrsta;
use App\Models\Materijal;
use Illuminate\Http\Resources\Json\JsonResource;

class NakitResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $vrsta = Vrsta::find($this->vrstaID);
        $materijal = Materijal::find($this->materijalID);

        return [
            'id' => $this->id,
            'vrsta' => $vrsta->vrsta,
            'naziv' => $this->naziv,
            'materijal' => $materijal->materijal,
            'cena' => $this->cena
        ];
    }
}
