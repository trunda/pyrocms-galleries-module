<?php namespace Signifymedia\GalleriesModule\Type\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class TypeTableBuilder extends TableBuilder
{

    /**
     * The table columns.
     *
     * @var array
     */
    protected $filters = [
        'search' => [
            'fields' => [
                'name',
                'slug',
                'description',
            ],
        ],
    ];

    /**
     * The table columns.
     *
     * @var array
     */
    protected $columns = [
        'name',
        'description',
    ];

    /**
     * The table actions.
     *
     * @var array
     */
    protected $actions = [
        'delete',
    ];

    /**
     * The table options.
     *
     * @var array
     */
    protected $options = [
        'sortable' => true,
    ];

}
