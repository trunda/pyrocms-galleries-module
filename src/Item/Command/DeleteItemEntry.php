<?php
namespace Signifymedia\GalleriesModule\Item\Command;

use Anomaly\Streams\Platform\Entry\Contract\EntryRepositoryInterface;
use Signifymedia\GalleriesModule\Item\Contract\ItemInterface;
use Signifymedia\GalleriesModule\Item\Contract\ItemRepositoryInterface;

class DeleteItemEntry
{
    /**
     * @var ItemInterface
     */
    protected $item;

    /**
     * DeleteItemEntry constructor.
     * @param ItemInterface $item
     */
    public function __construct(ItemInterface $item)
    {
        $this->item = $item;
    }

    public function handle(EntryRepositoryInterface $entries, ItemRepositoryInterface $items)
    {
        if ($this->item->isForceDeleting()) {
            $items->restore($this->item);
            $item = $items->find($this->item->getId());
            $entries->forceDelete($item->getEntry());
        }
    }


}