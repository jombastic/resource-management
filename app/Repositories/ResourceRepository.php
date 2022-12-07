<?php

namespace App\Repositories;

use App\Models\Resource;
use Illuminate\Support\Facades\DB;

class ResourceRepository
{
    private $data_types;

    public function __construct() 
    {
        $this->data_types = ['title', 'resourceType', 'pdfFile', 'url', 'snippetDescription', 'openLinkInNewTab', 'htmlSnippet'];
    }

    public function storeResources($data)
    {
        return Resource::create($data);
    }

    public function getResource($id)
    {
        return Resource::where('id', $id)->first();
    }

    public function editResource($data)
    {
        DB::transaction(function () use ($data) {
            foreach ($this->data_types as $key) {
                $reset_data[$key] = NULL;
            }

            Resource::where('id', $data['id'])
                ->update($reset_data);

            return Resource::where('id', $data['id'])->update($data);
        });
    }

    public function deleteResource($id)
    {
        return Resource::where('id', $id)->delete();
    }
}
