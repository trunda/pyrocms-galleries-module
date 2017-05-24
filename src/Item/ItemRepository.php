<?php namespace Signifymedia\GalleriesModule\Item;

use Signifymedia\GalleriesModule\Item\Contract\ItemRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

class ItemRepository extends EntryRepository implements ItemRepositoryInterface
{

    /**
     * The entry model.
     *
     * @var ItemModel
     */
    protected $model;

    /**
     * Create a new ItemRepository instance.
     *
     * @param ItemModel $model
     */
    public function __construct(ItemModel $model)
    {
        $this->model = $model;
    }
}
