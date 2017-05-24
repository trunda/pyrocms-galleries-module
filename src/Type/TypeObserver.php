<?php namespace Signifymedia\GalleriesModule\Type;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;
use Signifymedia\GalleriesModule\Type\Command\CreateTypeStream;
use Signifymedia\GalleriesModule\Type\Command\DeleteTypeStream;
use Signifymedia\GalleriesModule\Type\Command\UpdateGalleries;
use Signifymedia\GalleriesModule\Type\Command\UpdateStream;
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
        $this->commands->dispatch(new CreateTypeStream($entry));

        parent::created($entry);
    }

    /**
     * Fired after a page type is deleted.
     *
     * @param EntryInterface|TypeInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->commands->dispatch(new DeleteTypeStream($entry));

        parent::deleted($entry);
    }

    /**
     * Run before a record is updated.
     *
     * @param EntryInterface|TypeInterface $entry
     */

    public function updating(EntryInterface $entry)
    {
        $this->commands->dispatch(new UpdateStream($entry));
        $this->commands->dispatch(new UpdateGalleries($entry));

        parent::updating($entry);
    }


}
