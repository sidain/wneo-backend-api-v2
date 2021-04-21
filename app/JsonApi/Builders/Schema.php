<?php

namespace App\JsonApi\Builders;

use App\Models\_category;
use Illuminate\Support\Facades\Log;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'builders';

    /**
     * @param \App\Builder $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        // return (string) $resource->getRouteKey();
        return (string) $resource->builder_id;
    }

    /**
     * @param \App\Builder $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        $b_cats = json_decode($resource->categorys_json);
        $cats = [];
        $cat_names = [];

        foreach ((array)$b_cats as $cat_id => $cat_count) {

            if( $cat_count > 0 ){
                $cats[] = $cat_id;

                Log::info("$cat_id");
            }
        }

        if( $cats !== NULL){
            $cats = _category::whereIn( 'cat_id', (array)$cats )->get('cat_name');

            foreach ($cats as $key => $value) {
                $cat_names[] = $value->cat_name;
            }
        }

        return [
            'builder' => $resource->builder,
            'builder_id' => $resource->builder_id,

            'street' => $resource->street,
            'city' => $resource->city,
            'state' => $resource->state,
            'country' => $resource->country,

            'site' => $resource->site,
            'logo' => $resource->logo,

            'categorys' => $cat_names,
            'categorys_json' => $resource->categorys_json,

            'createdAt' => $resource->created_at,
            'updatedAt' => $resource->updated_at,

            // 'acf' => [
            //     'name' => $resource->builder,
            // ]
        ];
    }

    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'products' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
            ]
        ];
    }
}
