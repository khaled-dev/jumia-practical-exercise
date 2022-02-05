<?php

namespace App\Http\Resources;

use App\Services\DataTransferObjects\CustomerDTO;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var CustomerDTO $this */
        return [
            'name' => $this->getName(),
            'code' => $this->getCode(),
            'state' => $this->getState(),
            'phone' => $this->getPhone(),
        ];
    }
}
