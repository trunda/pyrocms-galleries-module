<?php
namespace Signifymedia\GalleriesModule\Type\Command;

use Signifymedia\GalleriesModule\Gallery\Contract\GalleryInterface;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryRepositoryInterface;
use Signifymedia\GalleriesModule\Type\Contract\TypeInterface;
use Signifymedia\GalleriesModule\Type\Contract\TypeRepositoryInterface;

/**
 * Class UpdateGalleries
 * @package Signifymedia\GalleriesModule\Type\Command
 */
class UpdateGalleries
{
    /**
     * The post type instance.
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
     * @param GalleryRepositoryInterface $galleries
     */
    public function handle(TypeRepositoryInterface $types, GalleryRepositoryInterface $galleries)
    {
        /* @var TypeInterface $type */
        if (!$type = $types->find($this->type->getId())) {
            return;
        }

        /* @var GalleryInterface $gallery */
        foreach ($type->getGalleries() as $gallery) {
            $galleries->save($gallery->setAttribute('entry_type', $this->type->getEntryModelName()));
        }
    }
}
