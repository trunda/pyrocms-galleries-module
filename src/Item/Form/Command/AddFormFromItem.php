<?php
namespace Signifymedia\GalleriesModule\Item\Form\Command;

use Signifymedia\GalleriesModule\Gallery\Contract\GalleryInterface;
use Signifymedia\GalleriesModule\Item\Contract\ItemInterface;
use Signifymedia\GalleriesModule\Item\Form\ItemEntryFormBuilder;

/**
 * Class AddFormFromItem
 * @package Signifymedia\GalleriesModule\Item\Form\Command
 */
class AddFormFromItem extends AddForm
{
    /**
     * @var ItemInterface
     */
    protected $item;

    /**
     * AddFormFromItem constructor.
     * @param \Signifymedia\GalleriesModule\Item\Form\ItemEntryFormBuilder $builder
     * @param \Signifymedia\GalleriesModule\Gallery\Contract\GalleryInterface $gallery
     * @param \Signifymedia\GalleriesModule\Item\Contract\ItemInterface $item
     */
    public function __construct(ItemEntryFormBuilder $builder, GalleryInterface $gallery, ItemInterface $item)
    {
        parent::__construct($builder, $gallery);
        $this->item = $item;
    }
}