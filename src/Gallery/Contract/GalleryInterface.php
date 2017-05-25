<?php
namespace Signifymedia\GalleriesModule\Gallery\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Support\Collection;
use Signifymedia\GalleriesModule\Type\Contract\TypeInterface;

/**
 * Interface GalleryInterface
 * @package Signifymedia\GalleriesModule\Gallery\Contract
 */
interface GalleryInterface extends EntryInterface
{
    /**
     * @return TypeInterface
     */
    public function getType();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return Collection
     */
    public function getItems();

    /**
     * @return string
     */
    public function getSlug();

}
