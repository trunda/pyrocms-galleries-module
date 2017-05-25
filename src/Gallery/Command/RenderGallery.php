<?php
namespace Signifymedia\GalleriesModule\Gallery\Command;

use Anomaly\EditorFieldType\EditorFieldType;
use Anomaly\EditorFieldType\EditorFieldTypePresenter;
use Illuminate\Contracts\View\Factory;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryInterface;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryRepositoryInterface;

class RenderGallery
{
    /**
     * @var string
     */
    protected $slug;

    /**
     * RenderGallery constructor.
     */
    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    public function handle(Factory $view, GalleryRepositoryInterface $galleries) {
        /** @var $gallery GalleryInterface */
        if (!$gallery = $galleries->findBySlug($this->slug)) {
            throw new \InvalidArgumentException("Gallery with slug " . $this->slug . " does not exist");
        }

        $type = $gallery->getType();

        /* @var EditorFieldType $layout */
        /* @var EditorFieldTypePresenter $presenter */
        $layout    = $type->getFieldType('layout');

        return $view->make($layout->getViewPath(), compact('gallery'))->render();
    }
}
