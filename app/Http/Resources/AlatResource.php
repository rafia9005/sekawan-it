<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'alat_kategori_id' => $this->whenLoaded('Kategori'),
            'alat_nama' => $this->alat_nama,
            'alat_deskripsi' => $this->alat_deskripsi,
            'alat_hargaperhari' => $this->alat_hargaperhari,
            'alat_stok' => $this->alat_stok,
            'created_at' => date('d-m-y', strtotime($this->created_at)),
            'updated_at' => date('d-m-y', strtotime($this->updated_at))
        ];
    }
}
