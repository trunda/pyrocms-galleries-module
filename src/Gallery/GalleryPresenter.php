<?php
namespace Signifymedia\GalleriesModule\Gallery;

use Anomaly\Streams\Platform\Entry\EntryPresenter;
use Signifymedia\GalleriesModule\Gallery\Command\RenderGallery;

/**
 * Class GalleryPresenter
 * @package Signifymedia\GalleriesModule\Gallery
 */
class GalleryPresenter extends EntryPresenter
{
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->dispatch(new RenderGallery($this->object->getSlug()));
    }
}