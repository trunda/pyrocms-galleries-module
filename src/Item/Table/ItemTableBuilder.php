<?php namespace Signifymedia\GalleriesModule\Item\Table;

use Anomaly\Streams\Platform\Ui\Table\TableBuilder;
use Illuminate\Database\Eloquent\Builder;
use Signifymedia\GalleriesModule\Gallery\Contract\GalleryInterface;

class ItemTableBuilder extends TableBuilder
{
    /**
     * The table columns.
     *
     * @var array|string
     */
    protected $columns = [
        'image' => [
            'value' => 'entry.image.cropped.heighten(70)'
        ]
    ];

    /**
     * The table buttons.
     *
     * @var array|string
     */
    protected $buttons = [
        'edit'
    ];

    /**
     * The table actions.
     *
     * @var array|string
     */
    protected $actions = [
        'delete'
    ];

    /**
     * @var GalleryInterface
     */
    protected $gallery;

    /**
     * @param GalleryInterface $gallery
     * @return $this
     */
    public function setGallery(GalleryInterface $gallery)
    {
        $this->gallery = $gallery;
        return $this;
    }

    public function onQuerying(Builder $query) {
        if ($this->gallery) {
            $query->where('gallery_id', $this->gallery->getId());
        }
    }

}
