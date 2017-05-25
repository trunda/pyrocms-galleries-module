<?php
namespace Signifymedia\GalleriesModule\Item\Form;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;
use Signifymedia\GalleriesModule\Item\ItemModel;

class ItemEntryFormSections
{
    public function handle(ItemEntryFormBuilder $builder)
    {
        $builder->setSections([
            'image' => [
                'fields' => [
                    'item_image',
                ],
            ],
            'entry' => [
                'fields' => $this->getEntryFields($builder),
            ],
        ]);
        //dd($builder->getFormFields()->base()->map(function(FieldType $f) { return $f->getField(); })->all());
    }

    public function getEntryFields(ItemEntryFormBuilder $builder)
    {
        return $builder->getFormFields()->base()
            ->filter(function (FieldType $type) {
                return !$type->getEntry() instanceof ItemModel;
            })
            ->map(function (FieldType $type) {
                return 'entry_' . $type->getField();
            });
    }
}
