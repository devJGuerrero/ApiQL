<?php

namespace DevJG\ApiQL\Contracts\Resources;

use Illuminate\Http\Request;

/**
 * Interface Base
 * @package DevJG\ApiQL\Contracts\Resource
 */
interface Base
{
    /**
     * En: Build the resource requested by the client
     * Es: Construir el recurso solicitado por el cliente
     * @param Request $request
     * @param array $payload
     * @return array
     */
    public function builder(Request $request, array $payload): array;
}