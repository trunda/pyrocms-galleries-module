<?php
namespace Signifymedia\GalleriesModule\Item\Form\Command;

use Signifymedia\GalleriesModule\Item\Form\ItemFormBuilder;

class AddItemFormFromItem extends AddFormFromItem
{
    /**
     * @param ItemFormBuilder $builder
     */
    public function handle(ItemFormBuilder $builder) {
        $builder->setEntry($this->item->getId());

        $this->builder->addForm('item', $builder);
    }
}