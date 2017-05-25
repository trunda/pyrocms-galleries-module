<?php namespace Signifymedia\GalleriesModule\Item\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;

interface ItemInterface extends EntryInterface
{

    /**
     * Get the related entry.
     *
     * @return EntryInterface
     */
    public function getEntry();

    /**
     * Get the related entry's ID.
     *
     * @return null|int
     */
    public function getEntryId();
}
