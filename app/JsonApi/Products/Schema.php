<?php

namespace App\JsonApi\Products;

use App\Models\_image;
use App\Models\_builder;
use App\Models\_category;

use Illuminate\Support\Facades\Log;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'products';

    /**
     * @param \App\Product $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Product $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        $builder = _builder::where('builder_id', $resource->builder_id )->value('builder');
        // $builder_set = count($builder);

        $image = _image::where('image_id', $resource->image1_id)->value('image_url');

        $cats = json_decode($resource->categorys_json);
        $cat_names = [];

        if( $cats !== NULL){
            $cats = _category::whereIn( 'cat_id', (array)$cats )->get('cat_name');

            foreach ($cats as $key => $value) {
                $cat_names[] = $value->cat_name;
            }
        }


        return [
            'name' => $resource->product_name,
            'product_id' => $resource->product_id,
            'part_number' => $resource->part_number,

            'image' => [
                'image_src' => asset($image),
                // 'createdAt' => $resource->created_at,
            ],
            // 'image1' => $resource->image1,

            'builder_id' => $resource->builder_id,
            'builder' => $builder ?? '' ,

            'description' => $resource->description,

            'categorys' => $cat_names,
            'category_json' => $resource->categorys_json,

            'createdAt' => $resource->created_at,
            'updatedAt' => $resource->updated_at,
        ];
    }

    // public function getResourceLinks($resource){
    // }




















    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        Log::info("".print_r($isPrimary, true));
        Log::info("".print_r($resource, true));
        Log::info("".print_r($includeRelationships, true));


        return [
            'builder' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,


                // self::DATA => function () use ($resource) {
                //     return $resource->builder_id;
                // },

            ],

        //     // 'categorys' => [
        //     //     self::SHOW_SELF => true,
        //     //     self::SHOW_RELATED => true,
        //     //     // self::DATA => function () use ($resource) {
        //     //     //     return $resource->categorys;
        //     //     // },
        //     // ]
        ];

        // return [];
    }






}
