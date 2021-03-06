<?php

namespace Tests\Http\Resources;

use DevJG\ApiQL\Resources\ApiQLResource;

/**
 * Class CountryResource
 * @property mixed id
 * @property mixed name
 * @property mixed departments
 * @property mixed created_at
 * @property mixed updated_at
 * @package Tests\Http\Resources
 */
class CountryResource extends ApiQLResource
{
    /**
     * En: Transform the resource into an array
     * Es: Transformar el recurso en una matriz
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return $this->builder($request, [
            "id"          => $this->id,
            "name"        => $this->name,
            "departments" => DepartmentResource::collection($this->departments),
            "createdAt"   => $this->created_at->format('d-m-Y H:i:s'),
            "updatedAt"   => $this->updated_at->format('d-m-Y H:i:s')
        ]);
    }
}