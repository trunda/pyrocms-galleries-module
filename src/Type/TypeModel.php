<?php namespace Signifymedia\GalleriesModule\Type;

use Anomaly\Streams\Platform\Entry\EntryCollection;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Signifymedia\GalleriesModule\Gallery\GalleryModel;
use Signifymedia\GalleriesModule\Type\Command\GetTypeStream;
use Signifymedia\GalleriesModule\Type\Contract\srting;
use Signifymedia\GalleriesModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Model\Galleries\GalleriesTypesEntryModel;

class TypeModel extends GalleriesTypesEntryModel implements TypeInterface
{
    /**
     * Get the related entry stream ID.
     *
     * @return integer
     */
    public function getEntryStreamId()
    {
        $stream = $this->getEntryStream();

        return $stream ? $stream->getId() : null;
    }

    /**
     * @return StreamInterface
     */
    public function getEntryStream()
    {
        return $this->dispatch(new GetTypeStream($this));
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @return srting
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getEntryModelName()
    {
        return $this->getEntryStream()->getEntryModelName();
    }

    /**
     * @return string
     */
    public function getLayout()
    {
        return $this->layout;
    }

    /**
     * @return EntryCollection
     */
    public function getGalleries()
    {
        return $this->galleries;
    }

    /**
     * Return the posts relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function galleries()
    {
        return $this->hasMany(GalleryModel::class, 'type_id');
    }
}
