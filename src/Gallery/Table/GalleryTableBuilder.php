<?php
namespace Signifymedia\GalleriesModule\Gallery\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

/**
 * Class GalleryTableBuilder
 * @package Signifymedia\GalleriesModule\Gallery\Table
 */
class GalleryTableBuilder extends TableBuilder
{
    /**
     * The table filters.
     *
     * @var array|string
     */
    protected $filters = [
        'search' => [
            'fields' => [
                'name',
                'slug',
            ],
        ],
    ];


    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'name',
        'slug' => [
            'value' => '<span class="tag tag-default tag-sm">{entry.slug}</span>'
        ]
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'items' => [
            'href' => 'admin/galleries/items/{entry.id}',
            'type' => 'info',
            'icon' => 'fa fa-picture-o'
        ],
        'edit',
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete'
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'sortable' => true
    ];
}
