<?php
namespace Signifymedia\GalleriesModule\Item\Form\Command;

use ClassesWithParents\E;
use Illuminate\Http\Request;
use Signifymedia\GalleriesModule\Entry\Form\EntryFormBuilder;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryInterface;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryRepositoryInterface;
use Signifymedia\GalleriesModule\Item\Form\ItemEntryFormBuilder;

/**
 * Class AddEntryFormFromRequest
 * @package Signifymedia\GalleriesModule\Item\Form\Command
 */
class AddEntryForm extends AddForm
{
    public function handle(EntryFormBuilder $builder)
    {
        $this->builder->addForm('entry', $builder->setModel($this->gallery->getType()->getEntryModelName()));
    }
}
