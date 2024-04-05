<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cauhoi extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'noidung' => $this->tendethi,
            'dap_an_a' => $this->dap_an_a,
            'dap_an_b'=>$this->dap_an_b,
            'dap_an_c'=>$this->dap_an_c,
            'dap_an_d'=>$this->dap_an_d,
            'dap_an_dung'=>$this->dap_an_dung,
            'dethi_id'=>$this->dethi_id,
            'created_at' => $this->created_at ? $this->created_at->format('d/m/Y') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d/m/Y') : null,
          ];
    }
}
