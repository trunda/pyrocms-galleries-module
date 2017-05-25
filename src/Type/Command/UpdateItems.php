<?php
namespace Signifymedia\GalleriesModule\Type\Command;

use Signifymedia\GalleriesModule\Gallery\Contract\GalleryInterface;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryRepositoryInterface;
use Signifymedia\GalleriesModule\Item\Contract\ItemInterface;
use Signifymedia\GalleriesModule\Item\Contract\ItemRepositoryInterface;
use Signifymedia\GalleriesModule\Type\Contract\TypeInterface;
use Signifymedia\GalleriesModule\Type\Contract\TypeRepositoryInterface;

/**
 * Class UpdateGalleries
 * @package Signifymedia\GalleriesModule\Type\Command
 */
class UpdateItems
{
    /**
     * The gallery type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Update a new UpdatePosts instance.
     *
     * @param TypeInterface $type
     */
    public function __construct(TypeInterface $type)
    {
        $this->type = $type;
    }

    /**
     * Handle the command.
     *
     * @param TypeRepositoryInterface $types
     * @param ItemRepositoryInterface $items
     */
    public function handle(TypeRepositoryInterface $types, ItemRepositoryInterface $items)
    {
        /* @var TypeInterface $type */
        if (!$type = $types->find($this->type->getId())) {
            return;
        }

        /* @var GalleryInterface $gallery */
        /** @var ItemInterface $item */
        foreach ($type->getGalleries() as $gallery) {
            foreach ($gallery->getItems() as $item) {
                $items->save($item->setAttribute('entry_type', $this->type->getEntryModelName()));
            }
        }
    }
}
