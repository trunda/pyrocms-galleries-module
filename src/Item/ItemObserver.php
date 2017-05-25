<?php namespace Signifymedia\GalleriesModule\Item;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;
use Signifymedia\GalleriesModule\Item\Command\DeleteItemEntry;
use Signifymedia\GalleriesModule\Item\Contract\ItemInterface;

/**
 * Class ItemObserver
 * @package Signifymedia\GalleriesModule\Item
 */
class ItemObserver extends EntryObserver
{
    /**
     * @param EntryInterface|ItemInterface $entry
     */
    public function deleting(EntryInterface $entry)
    {
        $this->dispatch(new DeleteItemEntry($entry));
        parent::deleting($entry);
    }

}
