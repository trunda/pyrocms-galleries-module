<?php
namespace Signifymedia\GalleriesModule\Type\Command;

use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Signifymedia\GalleriesModule\Type\Contract\TypeInterface;

class DeleteTypeStream
{
    /**
     * @var TypeInterface
     */
    private $type;

    /**
     * DeleteTypeStream constructor.
     * @param TypeInterface $type
     */
    public function __construct(TypeInterface $type)
    {
        $this->type = $type;
    }


    /**
     * @param \Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface $streams
     */
    public function handle(StreamRepositoryInterface $streams) {
        if ($this->type->isForceDeleting() && $stream = $streams->find($this->type->getEntryStreamId())) {
            $streams->delete($stream);
        }
    }
}