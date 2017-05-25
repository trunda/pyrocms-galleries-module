<?php
namespace Signifymedia\GalleriesModule\Item\Form\Command;

use Signifymedia\GalleriesModule\Item\Form\ItemFormBuilder;

/**
 * Class AddItemFormFromRequest
 * @package Signifymedia\GalleriesModule\Item\Form\Command
 */
class AddItemForm extends AddForm
{
    public function handle(ItemFormBuilder $builder) {
        $this->builder->addForm('item', $builder->setGallery($this->gallery));
    }
}