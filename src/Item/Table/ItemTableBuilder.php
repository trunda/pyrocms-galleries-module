<?php namespace Signifymedia\GalleriesModule\Item\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;

class ItemTableBuilder extends TableBuilder
{
    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'image' => [
            'value' => 'entry.image.cropped.heighten(70)'
        ]
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit'
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete'
    ];
}
