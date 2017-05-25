<?php namespace Signifymedia\GalleriesModule\Gallery;

use Signifymedia\GalleriesModule\Gallery\Contract\GalleryRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class GalleryRepository
 * @package Signifymedia\GalleriesModule\Gallery
 */
class GalleryRepository extends EntryRepository implements GalleryRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var GalleryModel
     */
    protected $model;

    /**
     * Create a new GalleryRepository instance.
     *
     * @param GalleryModel $model
     */
    public function __construct(GalleryModel $model)
    {
        $this->model = $model;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
