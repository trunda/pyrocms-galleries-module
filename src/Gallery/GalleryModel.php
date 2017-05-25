<?php namespace Signifymedia\GalleriesModule\Gallery;

use Anomaly\Streams\Platform\Support\Collection;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryInterface;
use Anomaly\Streams\Platform\Model\Galleries\GalleriesGalleriesEntryModel;
use Signifymedia\GalleriesModule\Item\ItemModel;
use Signifymedia\GalleriesModule\Type\Contract\TypeInterface;

class GalleryModel extends GalleriesGalleriesEntryModel implements GalleryInterface
{
    /**
     * Always eager load these.
     *
     * @var array
     */
    protected $with = [
        'type',
    ];

    /**
     * @return TypeInterface
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Collection
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Return the pages relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(ItemModel::class, 'gallery_id');
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
