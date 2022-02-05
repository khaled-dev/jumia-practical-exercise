<?php

namespace App\Http\Resources;

use App\Services\DataTransferObjects\CountryDTO;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var CountryDTO $this */
        return [
            'code' => $this->getCode(),
            'name' => $this->getName(),
        ];
    }
}
