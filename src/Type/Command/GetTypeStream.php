<?php
namespace Signifymedia\GalleriesModule\Type\Command;

use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Signifymedia\GalleriesModule\Type\Contract\TypeInterface;

class GetTypeStream
{

    /**
     * The post type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Create a new GetTypeStream instance.
     *
     * @param TypeInterface $type
     */
    public function __construct(TypeInterface $type)
    {
        $this->type = $type;
    }

    /**
     * Handle the command.
     *
     * @param  StreamRepositoryInterface $streams
     * @return \Anomaly\Streams\Platform\Stream\Contract\StreamInterface|null
     */
    public function handle(StreamRepositoryInterface $streams)
    {
        return $streams->findBySlugAndNamespace($this->type->getSlug() . '_galleries', 'galleries');
    }
}
