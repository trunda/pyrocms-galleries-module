<?php
namespace Signifymedia\GalleriesModule\Type\Command;

use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Illuminate\Config\Repository;
use Signifymedia\GalleriesModule\Type\Contract\TypeInterface;

/**
 * Class CreateTypeStream
 * @package Signifymedia\GalleriesModule\Type\Command
 */
class CreateTypeItemsStream
{

    /**
     * The post type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Create a new CreateTypeStream instance.
     *
     * @param TypeInterface $type
     */
    public function __construct(TypeInterface $type)
    {
        $this->type = $type;
    }

    /**
     * @param StreamRepositoryInterface $streams
     * @param Repository                $config
     */
    public function handle(StreamRepositoryInterface $streams, Repository $config)
    {
        $streams->create(
            [
                $config->get('app.fallback_locale') => [
                    'name'        => $this->type->getName(),
                    'description' => $this->type->getDescription(),
                ],
                'slug'                              => $this->type->getSlug() . '_items',
                'namespace'                         => 'galleries',
                'locked'                            => false,
                'translatable'                      => true,
                'trashable'                         => true,
                'hidden'                            => true,
            ]
        );
    }
}
