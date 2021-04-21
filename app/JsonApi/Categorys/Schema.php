<?php

namespace App\JsonApi\Categorys;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'categorys';

    /**
     * @param \App\Category $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
        // return (string) $resource->cat_id;
        // return (string) $resource->cat_name;
    }

    /**
     * @param \App\Category $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'createdAt' => $resource->created_at,
            'updatedAt' => $resource->updated_at,

            'cat_parent' => $resource->cat_parent,
            'cat_id' => $resource->cat_id,
            'cat_name' => $resource->cat_name,
            'cat' => $resource->cat,
        ];
    }

    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'products' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ],
        ];
    }
}
