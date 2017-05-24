<?php

namespace Signifymedia\GalleriesModule\Type\Table;

use Signifymedia\GalleriesModule\Type\Contract\TypeInterface;

/**
 * Class TypeTableButtons
 * @package Signifymedia\GalleriesModule\Type\Table
 */
class TypeTableButtons
{

    /**
     * Handle the buttons.
     *
     * @param TypeTableBuilder $builder
     */
    public function handle(TypeTableBuilder $builder)
    {
        $builder->setButtons(
            [
                'edit',
                'assignments' => [
                    'href' => function (TypeInterface $entry) {
                        return '/admin/galleries/assignments/' . $entry->getEntryStreamId();
                    },
                ],
            ]
        );
    }
}
