<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class SignifymediaModuleGalleriesCreateGalleriesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug'         => 'galleries',
        'translatable' => true,
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
        'name' => [
            'required'     => true,
            'translatable' => true,
        ],

        'slug' => [
            'required'     => true,
            'translatable' => false,
        ],

        'type' => [
            'required'     => true,
            'translatable' => false,
        ],
    ];
}
