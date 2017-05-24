<?php namespace Signifymedia\GalleriesModule\Type;

use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
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

        return $stream->getId();
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
}
