<?php
namespace Signifymedia\GalleriesModule\Gallery\Form\Command;

use Illuminate\Http\Request;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryInterface;
use Signifymedia\GalleriesModule\Gallery\Form\GalleryFormBuilder;
use Signifymedia\GalleriesModule\Type\Contract\TypeRepositoryInterface;

/**
 * Class AddTypeFromRequest
 * @package Signifymedia\GalleriesModule\Gallery\Form\Command
 */
class AddTypeFromGallery
{
    /**
     * @var GalleryFormBuilder
     */
    private $builder;
    /**
     * @var GalleryInterface
     */
    private $gallery;

    /**
     * AddTypeFromRequest constructor.
     * @param GalleryFormBuilder $builder
     * @param \Signifymedia\GalleriesModule\Gallery\Contract\GalleryInterface $gallery
     */
    public function __construct(GalleryFormBuilder $builder, GalleryInterface $gallery)
    {
        $this->builder = $builder;
        $this->gallery = $gallery;
    }

    public function handle() {
        $this->builder->setType($this->gallery->getType());
    }

}