<?php

namespace DevJG\ApiQL\Contracts\Resource;

/**
 * Interface Base
 * @package DevJG\ApiQL\Contracts\Resource
 */
interface Base
{
    /**
     * En: Build the resource requested by the client
     * Es: Construir el recurso solicitado por el cliente
     * @param array $fields
     * @return array
     */
    public function builder(array $fields): array;
}