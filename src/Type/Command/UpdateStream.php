<?php
namespace Signifymedia\GalleriesModule\Type\Command;

use Anomaly\Streams\Platform\Stream\Contract\StreamInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Illuminate\Config\Repository;
use Signifymedia\GalleriesModule\Type\Contract\TypeInterface;
use Signifymedia\GalleriesModule\Type\Contract\TypeRepositoryInterface;

/**
 * Class UpdateStream
 * @package Signifymedia\GalleriesModule\Type\Command
 */
class UpdateStream
{
    /**
     * The post type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Update a new UpdateStream instance.
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
     * @param StreamRepositoryInterface $streams
     * @param TypeRepositoryInterface   $types
     * @param Repository                $config
     */
    public function handle(StreamRepositoryInterface $streams, TypeRepositoryInterface $types, Repository $config)
    {
        /* @var TypeInterface $type */
        $type = $types->find($this->type->getId());

        /* @var StreamInterface $stream */
        $stream = $type->getEntryStream();

        $stream->fill(
            [
                $config->get('app.fallback_locale') => [
                    'name'        => $this->type->getName(),
                    'description' => $this->type->getDescription(),
                ],
                'slug' => $this->type->getSlug() . '_galleries',
            ]
        );

        $streams->save($stream);
    }
}
