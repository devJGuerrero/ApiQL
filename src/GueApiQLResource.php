<?php

namespace DevJG\ApiQL;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class GueApiQLResource
 * @package DevJG\GueApiQL
 */
abstract class GueApiQLResource extends JsonResource
{
    /**
     * En: You are a customer without application fields
     * Es: Es un cliente sin campos de solicitud
     * @param array $client
     * @return bool
     */
    private function isNotEmptyFieldsClient(array $client): bool {
        return count($client) >= 1;
    }

    /**
     * En: Obtain field names requested by the client
     * Es: Obtener nombres de campos solicitados por el cliente
     * @return array
     */
    private function obtainNamesRequestFieldsClient(): array {
        $model  = strtolower(class_basename($this->resource));
        $fields = resolve(Request::class)->get("fields") ?? [];
        return  Arr::exists($fields, $model)
            ? $fields[$model] === true
                ? []
                : $fields[$model]
            : $fields;
    }

    /**
     * En: Extract the data from the fields to the data model
     * Es: Extraer los datos de los campos al modelo de datos
     * @param $value
     * @param array $payload
     * @return array|mixed
     * @noinspection PhpMissingReturnTypeInspection
     */
    private function extractFieldData($value, $payload = array())
    {
        if ($value === true or is_object($payload)) return $payload;
        if (count($value) >= 1) {
            $item = [];
            foreach ($value as $key => $content) {
                if (array_key_exists($key, $payload) and ($content === true or is_array($content))) {
                    $item[$key] = $this->extractFieldData($content, $payload[$key]);
                }
            }
            return $item;
        }
        return [];
    }

    /**
     * En: Build the resource requested by the client
     * Es: Construir el recurso solicitado por el cliente
     * @param array $fields
     * @return array
     */
    public function builderResource(array $fields): array
    {
        $collector    = [];
        $clientFields = $this->obtainNamesRequestFieldsClient();
        if ($this->isNotEmptyFieldsClient($clientFields)) {
            foreach ($clientFields as $field => $value) {
                if (array_key_exists($field, $fields) and ($value === true or is_array($value) or is_object($value))) {
                    $collector[$field] = $this->extractFieldData($value, $fields[$field]);
                }
            }
            return $collector;
        } else {
            return $fields;
        }
    }
}