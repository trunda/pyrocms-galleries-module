<?php namespace Signifymedia\GalleriesModule\Gallery\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

interface GalleryRepositoryInterface extends EntryRepositoryInterface
{
    /**
     * @param $slug
     * @return mixed
     */
    public function findBySlug($slug);
}
