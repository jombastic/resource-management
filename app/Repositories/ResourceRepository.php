<?php

namespace App\Repositories;

use App\Models\Resource;

class ResourceRepository
{
    public function storeResources($data)
    {
        return Resource::create($data);
    }
}
