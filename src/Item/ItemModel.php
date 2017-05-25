<?php namespace Signifymedia\GalleriesModule\Item;

use Signifymedia\GalleriesModule\Item\Contract\ItemInterface;
use Anomaly\Streams\Platform\Model\Galleries\GalleriesItemsEntryModel;

class ItemModel extends GalleriesItemsEntryModel implements ItemInterface
{
    /**
     * Eager load these relations.
     *
     * @var array
     */
    protected $with = [
        'entry',
    ];

    /**
     * The cascaded relations.
     *
     * @var array
     */
    protected $cascades = [
        'entry',
    ];

    /**
     * Get the related entry.
     *
     * @return EntryInterface
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Get the related entry's ID.
     *
     * @return null|int
     */
    public function getEntryId()
    {
        $entry = $this->getEntry();

        return $entry->getId();
    }
}
