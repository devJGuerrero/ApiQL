<?php

namespace DevJG\ApiQL\Resources;

use Illuminate\Http\Request;
use DevJG\ApiQL\Contracts\Resources\Base;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ApiQLResource
 * @package DevJG\ApiQL\Resource
 */
abstract class ApiQLResource extends JsonResource implements Base
{
    /**
     * En: It contains the information of the http application
     * Es: Contiene la información de la solicitud http
     * @var Request
     */
    private Request $request;

    /**
     * En: You are a customer without application fields
     * Es: Es un cliente sin campos de solicitud
     * @param array $client
     * @return bool
     */
    private function isNotEmptyFieldsClient(array $client): bool { return count($client) >= 1; }

    /**
     * En: Obtain field names requested by the client
     * Es: Obtener nombres de campos solicitados por el cliente
     * @return array
     */
    private function getFieldsClient(): array {
        $model  = strtolower(class_basename($this->resource));
        $fields = $this->request->get("fields") ?? [];
        return  array_key_exists($model, $fields)
            ? $fields[$model] === true
                ? []
                : $fields[$model]
            : $fields;
    }

    /**
     * En: Indicate and establish if a previous resource is being built
     * Es: Indicar y establecer si un recurso anterior esta siendo construido
     * @return bool
     */
    private function isBuildingPreviousResource(): bool
    {
        $isBuilding     = true;
        if (!session()->has("isBuilding")) { session()->put("isBuilding", true);
            $isBuilding = false;
        }
        return $isBuilding;
    }

    /**
     * En: Eliminate that there is a resource being built
     * Es: Eliminar que existe un recurso siendo construido
     * @return void
     */
    private function removeBuildingPreviousResource(): void
    {
        session()->remove("isBuilding");
    }

    /**
     * En: Extract the data from the fields to the data model
     * Es: Extraer los datos de los campos al modelo de datos
     * @param $displayFields
     * @param array $payload
     * @return array|mixed
     * @noinspection PhpMissingReturnTypeInspection
     */
    private function extractFieldData($displayFields, $payload = array())
    {
        if ($displayFields === true and !is_object($payload))    return $payload;
        if ($displayFields === true and is_object($payload))     return $payload->toArray($this->request);
        if (!empty($displayFields)  and is_array($displayFields) and is_object($payload)) {
            $collector = [];
            $records   = $payload->toArray($this->request);
            array_walk($records, function($items, $key) use (&$collector, $displayFields) {
                array_walk($displayFields, function($display, $field) use (&$collector, $items, $key) {
                    if (array_key_exists($field, $items)
                        and $display === true and !is_object($items[$field])) {
                        $collector[$key][$field] = $items[$field];
                    } else if (array_key_exists($field, $items)
                        and $display === true and is_object($items[$field])) {
                        $collector[$key][$field] = $items[$field]->toArray($this->request);
                    } else if (array_key_exists($field, $items)
                        and is_array($display) and is_object($items[$field])) {
                        $collector[$key][$field] = $this->extractFieldData($display, $items[$field]);
                    }
                });
            });
            return $collector;
        }
        return [];
    }

    /**
     * En: Build the resource requested by the client
     * Es: Construir el recurso solicitado por el cliente
     * @param array $payload
     * @return array
     */
    public function builder(array $payload): array
    {
        if ($this->isBuildingPreviousResource()) return $payload;
        $collector     = [];
        $this->request = resolve(Request::class);
        $clientFields  = $this->getFieldsClient();
        if ($this->isNotEmptyFieldsClient($clientFields)) {
            array_walk($clientFields, function($displayFields, $field) use (&$collector, $payload) {
                if (array_key_exists($field, $payload)
                    and ($displayFields === true or is_array($displayFields))) {
                    $collector[$field] = $this->extractFieldData($displayFields, $payload[$field]);
                }
            });
            $this->removeBuildingPreviousResource();
            return $collector;
        }
        $this->removeBuildingPreviousResource();
        return $payload;
    }
}