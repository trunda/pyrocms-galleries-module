<?php namespace Signifymedia\GalleriesModule\Type\Contract;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;

/**
 * Interface TypeInterface
 * @package Signifymedia\GalleriesModule\Type\Contract
 */
interface TypeInterface extends EntryInterface
{
    /**
     * @return integer
     */
    public function getEntryStreamId();

    /**
     * @return StreamInterface
     */
    public function getEntryStream();

    /**
     * @return string
     */
    public function getSlug();

    /**
     * @return srting
     */
    public function getName();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getEntryModelName();
}
