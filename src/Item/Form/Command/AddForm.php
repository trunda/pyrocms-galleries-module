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
abstract class AddForm
{
    /**
     * @var ItemEntryFormBuilder
     */
    protected $builder;

    /**
     * @var GalleryInterface
     */
    protected $gallery;

    /**
     * AddEntryFormFromRequest constructor.
     * @param \Signifymedia\GalleriesModule\Item\Form\ItemEntryFormBuilder $builder
     * @param \Signifymedia\GalleriesModule\Gallery\Contract\GalleryInterface $gallery
     */
    public function __construct(ItemEntryFormBuilder $builder, GalleryInterface $gallery)
    {
        $this->builder = $builder;
        $this->gallery = $gallery;
    }
}
