<?php namespace Signifymedia\GalleriesModule\Type;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;
use Signifymedia\GalleriesModule\Type\Command\CreateTypeItemsStream;
use Signifymedia\GalleriesModule\Type\Command\DeleteTypeItemsStream;
use Signifymedia\GalleriesModule\Type\Command\UpdateItems;
use Signifymedia\GalleriesModule\Type\Command\UpdateTypeItemsStream;
use Signifymedia\GalleriesModule\Type\Contract\TypeInterface;

class TypeObserver extends EntryObserver
{
    /**
     * Fired after a page type is created.
     *
     * @param EntryInterface|TypeInterface $entry
     */
    public function created(EntryInterface $entry)
    {
        $this->commands->dispatch(new CreateTypeItemsStream($entry));

        parent::created($entry);
    }

    /**
     * Fired after a page type is deleted.
     *
     * @param EntryInterface|TypeInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->commands->dispatch(new DeleteTypeItemsStream($entry));

        parent::deleted($entry);
    }

    /**
     * Run before a record is updated.
     *
     * @param EntryInterface|TypeInterface $entry
     */

    public function updating(EntryInterface $entry)
    {
        $this->commands->dispatch(new UpdateTypeItemsStream($entry));
        $this->commands->dispatch(new UpdateItems($entry));

        parent::updating($entry);
    }


}
