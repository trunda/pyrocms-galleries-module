<?php
namespace Signifymedia\GalleriesModule\Gallery\Command;

use Illuminate\Http\Request;
use Signifymedia\GalleriesModule\Gallery\GalleryRepository;

/**
 * Class GalleryFromRequest
 * @package Signifymedia\GalleriesModule\Gallery\Command
 */
class GalleryFromRequest
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * GalleryFromRequest constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle(GalleryRepository $galleries)
    {
        return $galleries->find($this->request->route('gallery'));
    }
}
