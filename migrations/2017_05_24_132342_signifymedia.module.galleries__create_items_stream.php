<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class SignifymediaModuleGalleriesCreateItemsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'items',
        'translatable' => false,
        'searchable'   => true,
        'trashable'    => true,
        'sortable'     => true,
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'entry'   => [
            'required' => true,
        ],
        'gallery' => [
            'required' => true,
        ],
        'image'   => [
            'required' => true,
        ],
    ];
}
