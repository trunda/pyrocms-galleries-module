<?php namespace Signifymedia\GalleriesModule\Type\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;

/**
 * Interface TypeRepositoryInterface
 * @package Signifymedia\GalleriesModule\Type\Contract
 */
interface TypeRepositoryInterface extends EntryRepositoryInterface
{
    /**
     * Find a category by it's slug.
     *
     * @param $slug
     * @return null|TypeInterface
     */
    public function findBySlug($slug);
}
