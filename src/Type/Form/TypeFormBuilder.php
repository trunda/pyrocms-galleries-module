<?php namespace Signifymedia\GalleriesModule\Type\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

class TypeFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array|string
     */
    protected $fields = [
        '*',
        'slug' => [
            'disabled' => 'edit',
        ],
    ];

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [
        'type' => [
            'tabs' => [
                'general' => [
                    'title'  => 'module::tab.general',
                    'fields' => [
                        'name',
                        'slug',
                        'description',
                    ],
                ],
                'layout'  => [
                    'title'  => 'module::tab.layout',
                    'fields' => [
                        'layout',
                    ],
                ],
            ],
        ],
    ];
}
