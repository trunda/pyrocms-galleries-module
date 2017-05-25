<?php
namespace Signifymedia\GalleriesModule\Item\Form\Command;

use Signifymedia\GalleriesModule\Entry\Form\EntryFormBuilder;

/**
 * Class AddEntryFormFromItem
 * @package Signifymedia\GalleriesModule\Item\Form\Command
 */
class AddEntryFormFromItem extends AddFormFromItem
{
    /**
     * @param EntryFormBuilder $builder
     */
    public function handle(EntryFormBuilder $builder) {
        $type = $this->gallery->getType();

        $builder->setModel($type->getEntryModelName());
        $builder->setEntry($this->item->getEntryId());

        $this->builder->addForm('entry', $builder);
    }

}