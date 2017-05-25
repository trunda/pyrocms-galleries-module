<?php namespace Signifymedia\GalleriesModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class GalleriesModule extends Module
{

    /**
     * The addon icon.
     *
     * @var string
     */
    protected $icon = 'fa fa-picture-o';

    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'galleries' => [
            'buttons'  => [
                'new_gallery' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/galleries/choose',
                ],
            ],
            'sections' => [
                'items' => [
                    'hidden'  => true,
                    'matcher' => 'admin/galleries/items/*',
                    'href'    => 'admin/galleries/items/{request.route.parameters.gallery}',
                    'buttons' => [
                        'new_item'
                    ],
                ],
            ],
        ],
        'types'     => [
            'buttons' => [
                'new_type',
            ],
            'sections' => [
                'assignments' => [
                    'hidden'  => true,
                    'href'    => 'admin/galleries/assignments/{request.route.parameters.stream}',
                    'buttons' => [
                        'assign_fields' => [
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'href'        => 'admin/galleries/assignments/{request.route.parameters.stream}/choose',
                        ],
                    ],
                ],
            ],
        ],
        'fields'    => [
            'buttons'  => [
                'new_field' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/galleries/fields/choose',
                ],
            ],
        ],
    ];
}
