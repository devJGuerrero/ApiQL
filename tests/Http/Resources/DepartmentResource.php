<?php

namespace Tests\Http\Resources;

use DevJG\ApiQL\Resources\ApiQLResource;

/**
 * Class DepartmentResource
 * @property mixed id
 * @property mixed name
 * @property mixed created_at
 * @property mixed updated_at
 * @package Tests\Http\Resources
 */
class DepartmentResource extends ApiQLResource
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
            "createdAt"   => $this->created_at->format('d-m-Y H:i:s'),
            "updatedAt"   => $this->updated_at->format('d-m-Y H:i:s')
        ]);
    }
}