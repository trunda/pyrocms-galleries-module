<?php
namespace Signifymedia\GalleriesModule\Item;

use Anomaly\Streams\Platform\Entry\EntryPresenter;
use Anomaly\Streams\Platform\Support\Decorator;
use Signifymedia\GalleriesModule\Item\Contract\ItemInterface;

/**
 * Class GalleryPresenter
 * @package Signifymedia\GalleriesModule\Gallery
 */
class ItemPresenter extends EntryPresenter
{
    /**
     * The decorated object.
     * This is for IDE hinting.
     *
     * @var ItemInterface
     */
    protected $object;

    /**
     * Catch calls to fields on
     * the items's related entry.
     *
     * @param  string $key
     * @return mixed
     */
    public function __get($key)
    {
        $entry = $this->object->getEntry();

        if ($entry && $entry->hasField($key)) {
            return (New Decorator())->decorate($entry)->{$key};
        }

        return parent::__get($key);
    }
}

