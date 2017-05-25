<?php
namespace Signifymedia\GalleriesModule\Gallery\Form\Command;

use Illuminate\Http\Request;
use Signifymedia\GalleriesModule\Gallery\Form\GalleryFormBuilder;
use Signifymedia\GalleriesModule\Type\Contract\TypeRepositoryInterface;

/**
 * Class AddTypeFromRequest
 * @package Signifymedia\GalleriesModule\Gallery\Form\Command
 */
class AddTypeFromRequest
{
    /**
     * @var GalleryFormBuilder
     */
    private $builder;

    /**
     * AddTypeFromRequest constructor.
     * @param GalleryFormBuilder $builder
     */
    public function __construct(GalleryFormBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param \Signifymedia\GalleriesModule\Type\Contract\TypeRepositoryInterface $types
     * @param \Illuminate\Http\Request $request
     */
    public function handle(TypeRepositoryInterface $types, Request $request) {
        $this->builder->setType($types->find($request->get('type')));
    }

}