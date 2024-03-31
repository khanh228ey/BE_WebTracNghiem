<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Dethi extends JsonResource
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
            'tendethi' => $this->tendethi,
            'thoigianthi' => $this->thoigianthi,
            'thoigianbatdau'=>$this->thoigianbatdau,
            'thoigiankethtuc'=>$this->thoigiankethtuc,
            'user_id'=>$this->user_id,
            'trangthai'=>$this->trangthai,
            'monhoc_id'=>$this->monhoc_id,
            'created_at' => $this->created_at ? $this->created_at->format('d/m/Y') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('d/m/Y') : null,
          ];
    }
}
