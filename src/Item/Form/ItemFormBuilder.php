<?php namespace Signifymedia\GalleriesModule\Item\Form;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryInterface;

class ItemFormBuilder extends FormBuilder
{
    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'entry',
        'gallery',
    ];

    /**
     * @var GalleryInterface
     */
    protected $gallery;

    /**
     * @return GalleryInterface
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * @param GalleryInterface $gallery
     * @return ItemFormBuilder
     */
    public function setGallery($gallery)
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * Fired when the builder is ready to build.
     *
     * @throws \Exception
     */
    public function onReady()
    {
        if (!$this->getGallery() && !$this->getEntry()) {
            throw new \Exception('The gallery is required when creating a gallery.');
        }
    }

    /**
     * Fired just before saving the form.
     */
    public function onSaving()
    {
        $entry = $this->getFormEntry();

        if (!$entry->gallery_id) {
            $entry->gallery_id = $this->getGallery()->getId();
        }
    }

}
