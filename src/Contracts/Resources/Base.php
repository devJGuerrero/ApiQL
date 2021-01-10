<?php

namespace DevJG\ApiQL\Contracts\Resources;

/**
 * Interface Base
 * @package DevJG\ApiQL\Contracts\Resource
 */
interface Base
{
    /**
     * En: Build the resource requested by the client
     * Es: Construir el recurso solicitado por el cliente
     * @param array $payload
     * @return array
     */
    public function builder(array $payload): array;
}